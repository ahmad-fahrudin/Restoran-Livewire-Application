<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class VerificationController extends Controller
{
    public function showVerificationForm()
    {
        return view('auth.verify'); // Tampilkan form untuk memasukkan kode verifikasi
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'verification_code' => 'required',
        ]);

        $user = Auth::user();

        if ($user->verification_code == $request->verification_code) {
            $user->is_verified = true;
            $user->verification_code = null; // Hapus kode setelah diverifikasi
            $user->save();

            return redirect()->route('home')->with('success', 'Email berhasil diverifikasi!');
        } else {
            return back()->withErrors(['verification_code' => 'Kode verifikasi salah']);
        }
    }
}
