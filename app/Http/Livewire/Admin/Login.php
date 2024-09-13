<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email;
    public $password;
    public $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::guard('admin')->attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            Toaster::success('Berhasil!');
            return redirect()->route('admin.dashboard');
        } else {
            session()->flash('error', 'Ada yang salah dengan data yan di inputkan');
        }
    }
    public function render()
    {
        return view('livewire.admin.login')->layout('layouts.admin.login');
    }
}
