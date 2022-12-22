<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  Menampilkan halaman tabel produk
    public function index()
    {
        $users = Auth::user();
        return view('produk.index', [
            'users'   => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  Menampilkan form tambah produk 
    public function create()
    {
        return view('produk.create', [
            'users' => Auth::user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  Proses tambah data produk
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|unique:produks',
            'nama_barang' => 'required',
            'stok'        => 'required',
            'harga_beli'  => 'required',
            'harga_jual'  => 'required'
        ]);

        $validated['user_id'] = auth()->user()->id;

        Produk::create($validated);
        return redirect('/produk')->with('success', 'Berhasil Menambahkan Data Barang Baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */

    //  menampilkan form input untuk edit
    public function edit(Produk $produk)
    {
        return view('produk.edit', [
            'users' => Auth::user(),
            'produk' => $produk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */

    //  Proses update data
    public function update(Request $request, Produk $produk)
    {
        $rules = [
            'nama_barang' => 'required',
            'stok'        => 'required',
            'harga_beli'  => 'required',
            'harga_jual'  => 'required'
        ];

        if($request->kode_barang != $produk->kode_barang){
            $rules['kode_barang'] = 'required|unique:produks';
        }

        $validated = $request->validate($rules);
        $validated['user_id'] = auth()->user()->id;

        Produk::where('id', $produk->id)
            ->update($validated);
        
        return redirect('/produk')->with('success', 'Berhasil Memperbarui Data Barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */

    //  Untuk menghapus data berdasarkan id
    public function destroy(Produk $produk)
    {
        Produk::destroy($produk->id);
        return redirect('/produk')->with('success', 'Berhasil Menghapus Satu Barang');
    }
}
