<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable =['kode_barang', 'nama_barang', 'stok', 'harga_beli', 'harga_jual', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
