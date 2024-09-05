<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $login; // Ini bisa berupa email atau name
    public $password;
    public $remember = false;

    protected $rules = [
        'login' => 'required', // Bisa berupa email atau name
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();

        // Cek apakah login berupa email atau name
        $credentials = filter_var($this->login, FILTER_VALIDATE_EMAIL)
            ? ['email' => $this->login, 'password' => $this->password]
            : ['name' => $this->login, 'password' => $this->password];

        if (Auth::guard('admin')->attempt($credentials, $this->remember)) {
            // Redirect to admin dashboard
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
