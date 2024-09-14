<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;

class Success extends Component
{
    public function render()
    {
        return view('livewire.cart.success');
    }
}
