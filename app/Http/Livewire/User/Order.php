<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;

class Order extends Component
{
    public $allOrders;

    public function mount()
    {
        // Mengambil semua orders berdasarkan user yang login
        $this->allOrders = Checkout::where('user_id', Auth::user()->id)->get();
    }
    public function render()
    {
        return view(
            'livewire.user.order',
            [
                'allOrders' => $this->allOrders
            ]
        );
    }
}
