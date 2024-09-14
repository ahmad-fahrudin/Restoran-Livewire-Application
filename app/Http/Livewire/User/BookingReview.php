<?php

namespace App\Http\Livewire\User;

use App\Models\Review;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BookingReview extends Component
{
    public $review;
    public $bookingId;
    public $_page;

    protected $rules = [
        'review' => 'required',
    ];

    public function mount($id)
    {
        $this->_page = 'booking-review';
        $this->bookingId = $id;
    }

    public function show_review()
    {
        $this->_page = 'booking-review';
    }

    public function submitReview()
    {
        $this->validate();

        // Create the review in the database
        Review::create([
            'name' => Auth::user()->name,
            'review' => $this->review,
        ]);

        // Update the status of the related booking
        $booking = Booking::find($this->bookingId);
        if ($booking) {
            $booking->status = 'Finished';
            $booking->save();
        }

        // Reset the review form
        $this->reset('review');

        // Redirect to the thanks page
        $this->_page = 'thanks';
    }

    public function render()
    {
        if ($this->_page === 'thanks') {
            return view('livewire.user.thanks-review');
        }

        return view('livewire.user.booking-review');
    }
}
