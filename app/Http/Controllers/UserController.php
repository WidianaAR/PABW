<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credential = $request->only('email', 'password');
        if (Auth::attempt($credential)) {
            $user = Auth::user();
            if ($user->role_id == 1) {
                activity()->log('Admin login ke dalam sistem');
                return redirect()->intended('admin');
            } elseif ($user->role_id == 2) {
                activity()->log('Pengguna login ke dalam sistem');
                return redirect()->intended('pengguna');
            } elseif ($user->role_id == 3) {
                activity()->log('Mitra login ke dalam sistem');
                return redirect()->intended('mitra');
            }
            return redirect('login');
        }
        activity()->log('Error | Percobaan login gagal');
        return redirect('login')->withErrors(['login_gagal' => 'Email atau password salah!']);
    }

    public function logout(Request $request)
    {
        activity()->log('Logout dari sistem');
        $request->session()->flush();
        Auth::logout();
        return Redirect('login');
    }
}