<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart as CartModel;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{
    public $cartItems = [];
    public $price = 0;

    public function mount()
    {
        // Memeriksa apakah user sudah login
        if (auth()->check()) {
            // Mendapatkan item di keranjang
            $this->cartItems = CartModel::where('user_id', Auth::user()->id)->get();
            // Menghitung total harga
            $this->price = CartModel::where('user_id', Auth::user()->id)->sum('price');
        } else {
            abort(404); // Jika user tidak login, lempar 404
        }
    }

    public function render()
    {
        return view('livewire.cart', [
            'cartItems' => $this->cartItems,
            'price' => $this->price,
        ]);
    }
}
