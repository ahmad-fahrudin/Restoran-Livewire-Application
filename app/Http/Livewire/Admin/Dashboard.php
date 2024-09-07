<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class Dashboard extends Component
{
    public function logout()
    {
        Auth::logout();
        Alert::success('Success', 'Logout berhasil!');
        return redirect()->to('/admin/login');
    }
    public function render()
    {
        return view('livewire.admin.dashboard')->layout('layouts.admin.app');
    }
}
