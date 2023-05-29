<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Band;
use App\Models\Booking;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Reviews extends Component
{
    public $bookings, $booking, $book, $rating, $review, $bands, $transaction_count, $users, $totalCompletedBookings,$totalActiveBookings,$totalCancelBookings;
    public function mount($id)
    {
        $this->book = Booking::find($id);
        $this->bookings = Auth::user()->bookings()->whereIn('status', ['Pending', 'Completed'])->get();
        $user = Auth::user();
        $this->bookings = $user->bookings;
        $this->totalCompletedBookings =$user->bookings->where('status', 'Completed')->count();
        $this->totalActiveBookings = $user->bookings->where('status', 'Pending')->count();
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
        session()->flash("message", 'Review has been sent! Thank you.');
        return redirect('/dashboard');
    }
    public function getTransactionCount()
    {
        return Booking::where('status', 'Completed')->count();
    }

    // public function review($id, $booking)
    // {
    //     return view('components.review', [
    //         'booking' => $booking,
    //         'review' => $id,
    //     ]);
    // }

    public function render()
    {
        $bands = Band::withCount(['bookings' => function ($query) {
            $query->whereIn('status', ['Pending', 'Completed', 'Canceled']);
        }])->get();
        $transaction_count = $this->getTransactionCount();

        $users = User::with('bookings')->get();
        $bookings = Booking::whereIn('status', ['Pending', 'Completed'])->get();
        return view('livewire.dashboard.reviews',[
            'bookings' => $bookings
        ] ,compact('bands', 'transaction_count', 'users'))->extends('welcome');;
    }
}
