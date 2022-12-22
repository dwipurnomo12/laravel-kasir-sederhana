<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use function Ramsey\Uuid\v1;

class HomeController extends Controller
{
    public function index()
    {
        $kasir_total = DB::table('users')   
            ->selectRaw('count(*) as total')->first();

        
        return view('layouts.home', [
            'kasir_total' => $kasir_total
        ]);
    }
}
