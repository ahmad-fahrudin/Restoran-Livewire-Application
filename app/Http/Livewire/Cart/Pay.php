<?php

namespace App\Http\Livewire\Cart;

use App\Models\Checkout;
use Livewire\Component;

class Pay extends Component
{
    public $snapToken;
    public $checkoutId;
    public $_page;

    public function mount($id)
    {
        $this->_page = 'pay';
        $this->snapToken = Checkout::where('id', $id)->value('snap_token');
        $this->checkoutId = $id;
    }
    public function show_pay()
    {
        $this->_page = "pay";
    }

    public function updateStatus()
    {
        $checkout = Checkout::find($this->checkoutId);
        if ($checkout) {
            $checkout->status = 'Successfully';
            $checkout->save();
        }
        $this->_page = 'success';
    }

    public function render()
    {
        // Choose the page to display based on $_page value
        if ($this->_page === 'success') {
            return view('livewire.cart.success'); // Return success page view
        }

        // Default pay page view
        return view('livewire.cart.pay', [
            'snapToken' => $this->snapToken,
        ]);
    }
}
