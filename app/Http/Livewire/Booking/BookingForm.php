<?php

namespace App\Http\Livewire\Booking;

use App\Models\Booking;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class BookingForm extends Component
{
    public $name;
    public $date;
    public $phone;
    public $jumlah_orang;
    public $notes;
    public $snap_token;

    protected $rules = [
        'name' => 'required|string',
        'date' => 'required|date',
        'phone' => 'required|integer',
        'jumlah_orang' => 'required|integer',
        'notes' => 'required|string',
    ];

    public function submit()
    {
        // Validasi input dari pengguna
        $this->validate();

        // Simpan data booking ke database
        $booking = Booking::create([
            'name' => $this->name,
            'date' => $this->date,
            'user_id' => Auth::user()->id,
            'phone' => $this->phone,
            'jumlah_orang' => $this->jumlah_orang,
            'notes' => $this->notes,
            'status' => 'pending',
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
                'gross_amount' => 50000, // Jumlah pembayaran Down Payment
            ),
            'customer_details' => array(
                'first_name' => $this->name,
                'email' => Auth::user()->email,
            ),
        );

        // Ambil Snap Token dari Midtrans
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // Simpan snap token di dalam database
        $booking->snap_token = $snapToken;
        $booking->save();

        // Redirect ke halaman pembayaran dengan ID booking
        return redirect()->route('pay.booking', ['id' => $booking->id]);
    }
    public function render()
    {
        return view('livewire.booking.booking-form');
    }
}
