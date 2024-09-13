<?php

namespace App\Http\Livewire\Cart;

use App\Models\Checkout;
use Livewire\Component;

class Pay extends Component
{
    public $snapToken;

    public function mount($id)
    {
        $this->snapToken = Checkout::where('id', $id)->value('snap_token');
    }

    public function render()
    {
        return view('livewire.cart.pay', [
            'snapToken' => $this->snapToken,
        ]);
    }
}
