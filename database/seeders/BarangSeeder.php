<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("barang")->insert([
            'id_barang'=>'1',
            'id_distributor'=>'1',
            'nama_barang' =>'lcd',
            'harga_barang'=>'10000',
            'stok_barang'=>'10'
        ]);
    }
}
