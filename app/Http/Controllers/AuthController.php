<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function login(Request $request){
    return view('login');
    }
    public function register()
    {
        return view('register');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            # code...
            if (Auth::user()->status != 'active') {
                # code...
                Session::flash('status', 'failed');
                Session::flash('message', 'Your account is not active yet. Call Admin!');
                return redirect('login');
            }

            if (Auth::user()->role_id == 1){
                return redirect('dashboard');
            }
            if (Auth::user()->role_id == 2){
                return redirect('profile');
            }
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'login invalid');
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}


