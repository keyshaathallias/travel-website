<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function login(Request $request){
        $login = $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);

        if (Auth::attempt($login)){
            $request->session()->regenerate();

            if (Auth::user()->roles === 'administrator') {
                return redirect()->intended('/dashboard')->with('success', 'Login Successful!');
            } else {
                return redirect()->intended('/explore')->with('success', 'Login Successful!');
            }

        }
        return redirect()->back()->withErrors(['email' => 'Email or Password is Incorrect.']);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logged out successfully');
    }

    
}
