<?php

namespace App\Http\Controllers;

use App\Models\List_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        //Get the user
        $user = List_User::where('username', $request->username)->first();
    
        //If Hached by bcrypt
        if (Auth::attempt($credentials, $request->has('remember'))) 
        {
            return redirect('/list-user');
        }
        else //Else if Hached by md5
        {
            if( $user && $user->password == md5($request->password) )
            {
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect('/list-user');
    
                if($user->authorized){
                    $user->save();
    
                    Auth::login($user);
                    return redirect('/list-user');
                }else
                    Auth::logout();
            }
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
