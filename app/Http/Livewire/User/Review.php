<?php

namespace App\Http\Livewire\User;

use App\Models\Review as ModelReview;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Review extends Component
{
    public $review;
    public $checkoutId;
    public $_page;

    protected $rules = [
        'review' => 'required',
    ];

    public function mount($id)
    {
        $this->_page = 'review';
        $this->checkoutId = $id;
    }

    public function show_review()
    {
        $this->_page = 'review';
    }

    public function submitReview()
    {
        $this->validate();

        // Create the review in the database
        ModelReview::create([
            'name' => Auth::user()->name,
            'review' => $this->review,
        ]);

        $checkout = Checkout::find($this->checkoutId);
        if ($checkout) {
            $checkout->status = 'Finished';
            $checkout->save();
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

        return view('livewire.user.review');
    }
}
