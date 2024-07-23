<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('pages.register');
    }

    public function register(Request $request){
        $register = $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'password'  => 'required|min:6',
            'roles'     => 'user'
        ]);

        $data['name']       = $request->name;
        $data['email']      = $request->email;
        $data['password']   = Hash::make($request->password);
        $data['roles']      = 'user';

        User::create($data);

        $login = $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);

        if (Auth::attempt($login)){
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Registered Successfully! Please Login.');
        }
        return redirect()->back()->withErrors(['email' => 'Email or Password is Incorrect.']);
    }
}
