<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;

class Success extends Component
{
    public function render()
    {
        $checkout = Checkout::where('user_id', Auth::id())->first();
        if ($checkout && $checkout->status !== 'Successfully') {
            $checkout->status = 'Successfully';
            $checkout->save();
        }

        return view('livewire.cart.success');
    }
}
