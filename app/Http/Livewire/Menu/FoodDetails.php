<?php

namespace App\Http\Livewire\Menu;

use App\Models\Cart;
use App\Models\Foods;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FoodDetails extends Component
{
    public $id;
    public $foodItem;
    public $cartVerifing;
    public $userId;
    public $submit = false;
    public $cartCount; // Properti untuk menyimpan jumlah item di cart

    // Method mount akan otomatis dipanggil saat component di-load
    public function mount($id)
    {
        $this->id = $id;
        $this->foodItem = Foods::find($id);

        // Verifying if user added item to cart
        if (auth()->check()) {
            $this->userId = Auth::user()->id;
            $this->cartVerifing = Cart::where('foods_id', $id)
                ->where('user_id', $this->userId)
                ->count();
        } else {
            $this->cartVerifing = 0; // Jika tidak login, dianggap tidak ada item di cart
        }
    }

    public function addToCart()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        Cart::create([
            'user_id' => $this->userId,
            'foods_id' => $this->foodItem->id,
            'name' => $this->foodItem->name,
            'image' => $this->foodItem->image,
            'price' => $this->foodItem->price,
        ]);

        // Flash message untuk berhasil ditambahkan ke cart
        session()->flash('success', 'Item successfully added to cart!');

        // Update status
        $this->submit = true;
        $this->cartVerifing++;
        $this->cartCount++; // Tambahkan jumlah item di cart
    }

    public function render()
    {
        return view('livewire.menu.food-details');
    }
}
