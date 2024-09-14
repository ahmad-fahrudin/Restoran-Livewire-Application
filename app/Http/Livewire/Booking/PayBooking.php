<?php

namespace App\Http\Livewire\Booking;

use App\Models\Booking;
use Livewire\Component;

class PayBooking extends Component
{
    public $snapToken;
    public $bookingId;
    public $_page;

    public function mount($id)
    {
        $this->_page = 'pay-booking';
        $this->snapToken = Booking::where('id', $id)->value('snap_token');
        $this->bookingId = $id;
    }
    public function updateStatus()
    {
        $booking = Booking::find($this->bookingId);
        if ($booking) {
            $booking->status = 'Successfully';
            $booking->save();
        }
        $this->_page = 'success';
    }

    public function render()
    {
        if ($this->_page === 'success') {
            return view('livewire.cart.success'); // Return success page view
        }
        return view('livewire.booking.pay-booking', [
            'snapToken' => $this->snapToken,
        ]);
    }
}
