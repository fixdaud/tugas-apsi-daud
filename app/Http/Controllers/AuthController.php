<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
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
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                Session::flash('status', 'failed');
                Session::flash('message', 'Your account is not active yet. Call Admin!');
                return redirect('login');
            }

            $request->session()->regenerate();
            if (Auth::user()->role_id == 1) {
                return redirect('dashboard');
            }
            if (Auth::user()->role_id == 2) {
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
    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required |max:255',
            'password' => 'required |max:255',
            'phone' => 'required | max:255 ',
            'address' => 'required',
        ]);

        $request['password'] = Hash::make($request->password);
        $user =  User::create($request->all());

        Session::flash('status', 'success');
        Session::flash('message', 'Register Success. Wait approval from admin');
        return redirect('register');
    }
}
