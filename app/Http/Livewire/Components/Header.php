<?php

namespace App\Http\Livewire\Components;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Header extends Component
{
    public $cartCount = 0;

    protected $listeners = ['cartUpdated' => 'refreshCartCount'];

    public function mount()
    {
        $this->refreshCartCount();
    }

    public function refreshCartCount()
    {
        if (auth()->check()) {
            $this->cartCount = Cart::where('user_id', Auth::user()->id)->count();
        } else {
            $this->cartCount = 0;
        }
    }
    public function render()
    {
        return view('livewire.components.header');
    }
}
