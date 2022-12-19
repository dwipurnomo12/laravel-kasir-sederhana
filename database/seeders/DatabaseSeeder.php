<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Produk;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Produk::create([
            'kode_barang' => 'BRG100',
            'user_id'     => 1,  
            'nama_barang' => 'Dramason',
            'stok'        => 50,
            'harga_beli'  => 43000,
            'harga_jual'  => 45000
        ]);
    }
}
