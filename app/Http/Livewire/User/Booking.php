<?php

namespace App\Http\Livewire\User;

use App\Models\Booking as ModelsBooking;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Booking extends Component
{
    public $allBookings;
    public function mount()
    {
        // Ambil semua booking berdasarkan user yang login
        $this->allBookings = ModelsBooking::where('user_id', Auth::user()->id)->get();
    }
    public function render()
    {
        return view('livewire.user.booking', [
            'allBookings' => $this->allBookings
        ]);
    }
}
