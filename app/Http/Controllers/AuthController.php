<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email |unique:users',
            'password' => 'required|min:6'
        ]);
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    
        $verificationUrl = route('verification.verify', ['id' => $user->id]);

        Mail::send('auth.verifyEmail', ['verificationUrl' => $verificationUrl], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Verify Your Email Address');
        });

        return redirect('/login')->with('success', 'Please check your email to activate your account');
    }
}
