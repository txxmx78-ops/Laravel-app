<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm(){
        return view("auth.login");
    }
    public function login (Request $request) {
        $credentials = $request->validate([
            'email'=>['required', 'email'],
            'password'=>['required']
        ]);
        if(auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    public function logout () {

    }
}
