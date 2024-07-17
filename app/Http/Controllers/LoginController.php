<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

    public function forgotPassword(){
        return view('pages.forgotPassword');
    }

    public function forgotPasswordAct(Request $request){
        $customMessage = [
            'email.required'    => "Email can't be empty.",
            'email.email'       => "Email is not valid.",
            'email.exists'      => "Email is not registered.",
        ];
        
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ], $customMessage);

        $token = \Str::random(40);

        PasswordResetToken::updateOrCreate(
        [
            'email' => $request->email
        ],
        [
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
        ]);

        Mail::to($request->email)->send(new ResetPasswordMail($token));

        return redirect()->route('forgot.password')->with('success', 'The reset link has been sent!');
    }

    public function validationForgotPassword(Request $request, $token){
        $getToken = PasswordResetToken::where('token', $token)->first();

        if(!$getToken){
            return redirect()->route('login')->with('failed', 'Token is not valid.');
        }
        return view('pages.validationToken', compact('token'));
    }

    public function validationForgotPasswordAct(Request $request){
        $customMessage = [
            'password.required' => "Password can't be empty.",
            'password.min'      => "Password must be at least 6 characters.",
        ];

        $request->validate([
            'password' => 'required|min:6'
        ], $customMessage);

        $token = PasswordResetToken::where('token', $request->token)->first();

        if(!$token){
            return redirect()->route('login')->with('failed', 'Token is not valid.');
        }

        $user = User::where('email', $token->email)->first();

        if(!$user){
            return redirect()->route('login')->with('failed', 'Email is not registered.');
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        $token->delete();

        return redirect()->route('login')->with('success', 'Password has been reset.');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logged out successfully');
    }

    
}
