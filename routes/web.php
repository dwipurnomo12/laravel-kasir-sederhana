<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LayoutController::class, 'index'])->middleware('auth');
Route::get('/home', [LayoutController::class, 'index'])->middleware('auth');

Route::controller(LoginController::class)->group(function(){
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::post('logout', 'logout');
});

Route::group(['middleware' => ['auth']], function(){
    // Dashboard Admin
    Route::group(['middleware' => ['UserLogin:1']], function(){
        Route::resource('/produk', ProdukController::class);
    });

    // Dashboard Kasir
    Route::group(['middleware' => ['UserLogin:2']], function(){
        Route::resource('/penjualan', PenjualanController::class);
        Route::get('/api/penjualan', [PenjualanController::class, 'getAutocompleteData']);
        Route::post('/penjualan', [PenjualanController::class, 'proses_pembayaran']);
    });
});


