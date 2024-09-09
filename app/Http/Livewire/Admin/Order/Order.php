<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Checkout;
use Livewire\Component;

class Order extends Component
{
    public function render()
    {
        $checkout = Checkout::all();
        return view('livewire.admin.order.order', compact('checkout'))->layout('layouts.admin.app');
    }
}
