<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable =['quantity', 'total_bayar', 'user_id', 'status', 'nama_barang', 'kode_barang'];

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }


}
