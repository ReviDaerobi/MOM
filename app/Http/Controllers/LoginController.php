<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function username()
{
    return 'username'; // Ganti dengan nama kolom yang digunakan untuk login
}

    public function Login(Request $request) {

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

      
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/list-user');
        }
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
