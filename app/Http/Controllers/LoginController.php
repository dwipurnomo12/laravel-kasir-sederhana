<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan View berdasarkan User yang Login
    public function index()
    {
        if(Auth::user()){
            return redirect()->intended('home');
        }
    return view('login.index');
    }

    // Validation
    public function proses(Request $request)
    {
        $request->validate([
            'username'  => 'required',
            'password'  => 'required'
        ]);

        $credentials = $request->only('username', 'password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $users = Auth::user();

            if($users){
                return redirect()->intended('home');
            }

            return redirect()->intended('/');
        }

        return back()->with('error', 'Login Gagal');
    }

    // Logout
    public function logout(Request $request)
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
