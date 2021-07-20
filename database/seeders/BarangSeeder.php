<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('barang')->insert([
            'nama_barang' => 'Tip-ex Kenko Roller',
            'kategori' => 'ATK',
            'harga' => 2000,
            'stok' => 34,
            'created_at' => '2021-07-10',
        ]);
        DB::table('barang')->insert([
            'nama_barang' => 'Pulpen Pilot Balliner',
            'kategori' => 'ATK',
            'harga' => 3500,
            'stok' => 64,
            'created_at' => '2021-07-11',
        ]); 
        DB::table('barang')->insert([
            'nama_barang' => 'Pulpen Pilot Balliner',
            'kategori' => 'ATK',
            'harga' => 3500,
            'stok' => 64,
            'created_at' => '2021-07-12',
        ]);
         
        DB::table('barang')->insert([
            'nama_barang' => 'Pulpen Pilot Frixion',
            'kategori' => 'ATK',
            'harga' => 2500,
            'stok' => 64,
            'created_at' => '2021-07-13',
        ]);
        
        DB::table('barang')->insert([
            'nama_barang' => 'PowerBank Robot RT 20',
            'kategori' => 'Elektronik',
            'harga' => 15000,
            'stok' => 104,
            'created_at' => '2021-07-14',
        ]);
        
        DB::table('barang')->insert([
            'nama_barang' => 'Everycom X7 Proyektor',
            'kategori' => 'Elektronik',
            'harga' => 250000,
            'stok' => 14,
            'created_at' => '2021-07-17',
        ]);
        
        DB::table('barang')->insert([
            'nama_barang' => 'Kamera Canon EOS 250D',
            'kategori' => 'Elektronik',
            'harga' => 360000,
            'stok' => 11,
            'created_at' => '2021-07-18',
        ]);
        DB::table('barang')->insert([
            'nama_barang' => 'Laptop Dell Inspiron 15',
            'kategori' => 'Elektronik',
            'harga' => 4200000,
            'stok' => 10,
            'created_at' => '2021-07-19',
        ]);
        DB::table('barang')->insert([
            'nama_barang' => 'Epson Perfection V39',
            'kategori' => 'Elektronik',
            'harga' => 210000,
            'stok' => 18,
            'created_at' => '2021-07-20',
        ]);
    }
}
