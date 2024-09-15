<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Foods;
use App\Models\Booking;
use Livewire\Component;
use App\Models\Checkout;
use Jenssegers\Agent\Agent;

class Dashboard extends Component
{
    public $foodsCount;
    public $orderCount;
    public $bookingCount;
    public $userCount;
    public $browser;
    public $browserVersion;
    public $platform;

    public function mount()
    {
        // Mengambil jumlah produk, pesanan, admin, dan user
        $this->foodsCount = Foods::count();
        $this->orderCount = Checkout::count();
        $this->bookingCount = Booking::count();
        $this->userCount = User::count();

        // Mendapatkan informasi sistem pengguna
        $agent = new Agent();
        $this->browser = $agent->browser();
        $this->browserVersion = $agent->version($this->browser);
        $this->platform = $agent->platform();
    }
    public function render()
    {
        return view('livewire.admin.dashboard')->layout('layouts.admin.app');
    }
}
