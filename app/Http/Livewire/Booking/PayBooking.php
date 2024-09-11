<?php

namespace App\Http\Livewire\Booking;

use App\Models\Booking;
use Livewire\Component;

class PayBooking extends Component
{
    public $snapToken;

    public function mount($id)
    {
        $this->snapToken = Booking::where('id', $id)->value('snap_token');
    }

    public function render()
    {
        return view('livewire.booking.pay-booking', [
            'snapToken' => $this->snapToken,
        ]);
    }
}
