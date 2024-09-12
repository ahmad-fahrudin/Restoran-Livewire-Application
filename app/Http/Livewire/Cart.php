<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart as CartModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Cart extends Component
{
    public $cartItems = [];
    public $price = 0;

    public function mount($price = 0) // Default $price to 0 if not provided
    {
        $this->loadCart();
        $this->price = $price > 0 ? $price : CartModel::where('user_id', Auth::user()->id)->sum('price');
        Session::put('price', $this->price);
    }

    public function loadCart()
    {
        if (auth()->check()) {
            // Load items in the cart
            $this->cartItems = CartModel::where('user_id', Auth::user()->id)->get();
            // Calculate total price if not passed
            $this->price = CartModel::where('user_id', Auth::user()->id)->sum('price');
        } else {
            abort(404); // Abort if the user is not authenticated
        }
    }

    public function prepareCheckout()
    {
        $newPrice = Session::get('price');

        if ($newPrice > 0) {
            return redirect()->route('checkout');
        } else {
            abort(403); // Menghentikan akses jika harga tidak valid
        }
    }

    public function deleteItem($itemId)
    {
        // Delete item from the cart
        $cartItem = CartModel::where('user_id', Auth::user()->id)->where('id', $itemId)->first();

        if ($cartItem) {
            $cartItem->delete();
            session()->flash('message', 'Item berhasil dihapus dari keranjang!');
        }

        // Reload cart items and price
        $this->loadCart();
    }

    public function render()
    {
        return view('livewire.cart', [
            'cartItems' => $this->cartItems,
            'price' => $this->price,
        ]);
    }
}
