<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Band;
use App\Models\Booking;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $bookings, $bands, $book, $rating, $review, $users ,$totalCompletedBookings, $totalActiveBookings, $totalCancelBookings, $totalBookings;

    public function viewDetail($id)
    {
        $this->book = Booking::find($id);

    }
    public function mount()
    {
        // $this->bookings = Auth::user()->bookings;
        // $this->users = User::with('bookings')->get();
        // $this->bookings = Booking::whereIn('status', ['Pending', 'Completed', 'Canceled'])->get();
        $this->bookings = Auth::user()->bookings()->whereIn('status', ['Pending', 'Completed'])->get();
        $user = Auth::user();
        $this->bookings = $user->bookings;
        $this->totalCompletedBookings =$user->bookings->where('status', 'Completed')->count();
        $this->totalActiveBookings = $user->bookings->where('status', 'Pending')->count();
        $this->totalBookings = $user->bookings->whereIn('status', 'Completed', 'Canceled')->count();
        $this->totalCancelBookings = $user->bookings->where('status', 'Canceled')->count();
    }

    public function complete($id)
    {
        $booking = Booking::where('user_id', Auth::id())->findOrFail($id);
        $user = Auth::user();

        $booking->status = 'Completed';
        $booking->save();

        $this->validate([
            'rating' => 'required|integer|between:1,5',
            'review' => 'required|string|max:255',
        ]);

        $review = new Feedback();
        $review->rating = $this->rating;
        $review->review = $this->review;
        $review->booking_id = $id;

        $user->reviews()->save($review);

        $this->reset(['rating', 'review']);

        // Update the $bookings variable
        $this->bookings = Auth::user()->bookings()->whereIn('status', ['Pending', 'Completed'])->get();
        session()->flash("message", 'Review has been sent!');
        return redirect('/dashboard');
    }

    public function getTransactionCount()
    {
        return Booking::where('status', 'Completed')->count();
    }

    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'Canceled';
        $booking->save();


        // Update the $bookings variable
        $this->bookings = Booking::whereIn('status', ['Pending', 'Completed'])->get();
        return redirect('/dashboard');
    }

    // public function getTransactionCount()
    // {
    //     return Booking::where('status', 'Completed')->count();
    // }


    public function render()
    {

        $user = Auth::user();
        $active_bookings = Booking::whereIn('status', ['Pending'])->get();
        $total_bookings = Booking::whereIn('status', ['Completed'])->get();
        $cancel_booking = Booking::whereIn('status', ['Canceled'])->get();

        $bands = Band::withCount(['bookings' => function ($query) {
            $query->whereIn('status', ['Pending', 'Completed', 'Canceled']);
        }])->get();
        $transaction_count = $this->getTransactionCount();

        $users = User::with('bookings')->get();
        $bookings = Booking::whereIn('status', ['Pending', 'Completed'])->get();
        [
            'bookings' => $bookings
        ];

        return view('livewire..dashboard.index' ,compact('bands', 'transaction_count', 'users'));
    }
}
