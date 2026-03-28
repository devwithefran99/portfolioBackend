<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // try login
        if (Auth::attempt($credentials)) {

            return redirect('/dashboard');
        }else{
            return back()->withErrors([
                'email' => 'Invalid credentials',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

