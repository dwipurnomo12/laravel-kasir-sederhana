<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  Menampilkan tabel dari table penjualan
    public function index()
    {
        $users = Auth::user();
        $penjualan = Penjualan::where('status', '0')->first();

        return view('penjualan.index', [
            'users' => $users,
            'penjualans' => $penjualan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  Menampilkan form input data barang
    public function create()
    {
        $users = Auth::user();

        return view('penjualan.index', [
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  Proses tambah data
    public function store(Request $request)
    {
        $product_check = Penjualan::where('nama_barang', $request->nama_barang)->where('status', '0')->first();
        $harga_jual = Produk::where('nama_barang', $request->nama_barang)->first();

        // Kondisi jika data yang di tambahkan hanya 1
        if($product_check == null){
            $penjualan = new Penjualan;
            $penjualan->nama_barang = $request->nama_barang;
            $penjualan->quantity = $request->quantity;
            $penjualan->kode_barang = $request->kode_barang;
        
        //Kondisi jika user menambahkan barang lebih dari satu maka otomatis akan menambahkan 
        }else{
            $penjualan = Penjualan::where('nama_barang', $request->nama_barang)->where('status', '0')->first();
            $penjualan->nama_barang = $request->nama_barang;
            $penjualan->quantity += $request->quantity;
            $penjualan->kode_barang = $request->kode_barang;
        }
        $penjualan->total_bayar += $harga_jual->harga_jual * $request->quantity;
        $penjualan->user_id = Auth::user()->id;
        $penjualan->save();

        return redirect('/penjualan')->with('success', 'Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        return view('penjualan.pembayaran');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $penjualan)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */

    //  Menhgapus Data
    public function destroy(Penjualan $penjualan)
    {
        Penjualan::destroy($penjualan->id);
        return redirect('/penjualan')->with('success', 'Berhasil Dihapus');
    }

    // Autocomplet dan Autofill Jquery
    public function getAutocompleteData(Request $request)
    {
        if($request->has('term')){
            return Produk::where('nama_barang','like','%'.$request->input('term').'%')->get();
        }
    }

    // Untuk membersihkan data atau hapus semua data pada teble
    public function selesai(Request $request)
    {
        Penjualan::query()->delete();
        return redirect('/penjualan');
    }

}
