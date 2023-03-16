<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login() {
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
                return redirect()->intended('admin');
            } elseif ($user->role_id == 2) {
                return redirect()->intended('mitra');
            } elseif ($user->role_id == 3) {
                return redirect()->intended('pengguna');
            }
            return redirect('login');
        }
        return redirect('login')->withErrors(['login_gagal' => 'Akun tidak terdaftar di dalam sistem']);
    }

    public function logout(Request $request) 
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('login');
    }
}
