<?php

namespace App\Http\Livewire\Admin\Components;

use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Illuminate\Support\Facades\Auth;

class Sidebar extends Component
{
    public function logout()
    {
        Auth::logout();
        Toaster::success('Berhasil Logout!');
        return redirect()->to('/admin/login');
    }
    public function render()
    {
        return view('livewire.admin.components.sidebar');
    }
}
