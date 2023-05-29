<?php

namespace App\Http\Livewire\Booking;

use App\Models\Band;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $selectedBandId;
    public $band;
    public $bandId; //selectedbandID
    public $selectedBand;


    public $event_name, $event_location, $event_details, $time_start, $time_end, $event_date;

    public function submit(){
       $this->validate([
        'event_name' => 'required',
        'event_location' => 'required',
        'event_details' => 'required',
        'event_date' => 'required',
        'time_start' => 'required',
        'time_end' => 'required',
       ]);

       $user = Auth::user();
        $band = Band::findOrFail($this->selectedBand['id']);

        $book = new Booking();
        $book->user_id = $user->id;
        $book->event_name = $this->event_name;
        $book->event_location = $this->event_location;
        $book->event_date = $this->event_date;
        $book->event_details = $this->event_details;
        $book->time_start = $this->time_start;
        $book->time_end = $this->time_end;
        // $this->band = Band::findOrFail($this->selectedBand['id']);

        $book->band_id = $band->id;

        $book->save();

        session()->flash('message', 'Your booking request has been sent!');

        return redirect('/success');
    }

    // public function show($id, $band)
    // {
    //     $band = Band::findOrFail($id);
    //     return view('band.booking', ['band' => $band]);
    // }


    public function mount($id)
    {

        $this->selectedBand = Band::findOrFail($id);

        // $this->emit('musicBandSelected', $this->selectedBand);
    }


    public function cancel(){
        return redirect('/band');
    }



    public function booking($id, $band)
    {
        return view('components.booking', [
            'band' => $band,
            'booking_id' => $id,
        ]);
    }

    public function render()
    {
        $selectedBand = Band::find($this->selectedBandId);
        $bookings = $selectedBand ? $selectedBand->bookings : [];

        return view('livewire.booking.index', [
        'bookings' => $bookings,
        'selectedBand' => $selectedBand,
        ])->extends('welcome');
    }
}
