<?php

namespace App\Http\Livewire\Admin\Booking;

use App\Models\Booking as ModelsBooking;
use Livewire\Component;

class Booking extends Component
{
    public function render()
    {
        $booking = ModelsBooking::all();
        return view('livewire.admin.booking.booking', compact('booking'))->layout('layouts.admin.app');
    }
}
