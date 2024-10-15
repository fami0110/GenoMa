<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function process(Request $req) {
        $credential = $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $attemp = Auth::attempt([
            'email' => $credential['email'],
            'password' => $credential['password'],
        ]);

        if ($attemp) {
            $req->session()->regenerate();
            return redirect()->intended()->with('success', "Login successful!");
        }

        return back()->with("warning", "Username or Password Wrong!");
    }

    public function logout(Request $req) {
        Auth::logout();

        $req->session()->invalidate();

        $req->session()->regenerate();

        return redirect()->to('/login')->with('success', "Logout successful!");
    }
}
