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
    public $submit = false;

    // Method mount akan otomatis dipanggil saat component di-load
    public function mount($id)
    {
        $this->id = $id;
        $this->foodItem = Foods::find($id);

        // Verifying if user added item to cart
        if (auth()->check()) {
            $this->cartVerifing = Cart::where('foods_id', $id)
                ->where('user_id', Auth::user()->id)
                ->count();
        } else {
            $this->cartVerifing = 0; // Jika tidak login, dianggap tidak ada item di cart
        }
    }

    public function addToCart()
    {
        if (!$this->userId) {
            return redirect()->route('login');
        }

        Cart::create([
            'user_id' => $this->userId,
            'foods_id' => $this->foodItem->id,
            'name' => $this->foodItem->name,
            'image' => $this->foodItem->image,
            'price' => $this->foodItem->price,
        ]);

        $this->submit = true;
        $this->cartVerifing++;
    }

    public function render()
    {
        return view('livewire.menu.food-details');
    }
}
