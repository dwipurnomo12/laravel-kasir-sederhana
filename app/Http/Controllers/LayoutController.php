<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LayoutController extends Controller
{
    // Menampilkan halaman Home berdasarkan user
    public function index(){
        $users = Auth::user();

        return view('layouts.home', [
            'users' => $users
        ]);
    }
}
