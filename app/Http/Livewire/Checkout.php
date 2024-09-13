<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Checkout as CheckoutModel;

class Checkout extends Component
{
    public $name;
    public $phone;
    public $notes;
    public $price;

    public function mount()
    {
        // Set price from session or another source
        $this->price = Session::get('price');
    }
    public function checkout()
    {
        $price = Session::get('price');

        if ($price == 0) {
            abort(403); // Menghentikan akses jika harga tidak valid
        }

        return redirect()->route('checkout'); // Mengarahkan ke halaman checkout
    }


    public function submit()
    {
        // Validate form inputs
        $this->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:30',
            'notes' => 'required',
        ]);

        // Create a new checkout entry
        $checkout = CheckoutModel::create([
            "name" => $this->name,
            "phone" => $this->phone,
            "user_id" => Auth::user()->id,
            "price" => $this->price,
            "notes" => $this->notes,
            'status' => 'Pending',
        ]);

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');

        // Set parameter untuk pembayaran Midtrans
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(), // Gunakan ID unik untuk order
                'gross_amount' => $this->price, // Jumlah pembayaran Down Payment
            ),
            'customer_details' => array(
                'first_name' => $this->name,
                'email' => Auth::user()->email,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $checkout->snap_token = $snapToken;
        $checkout->save();

        Cart::where('user_id', Auth::user()->id)->delete();

        // Redirect to payment page
        return redirect()->route('pay', $checkout->id);
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
