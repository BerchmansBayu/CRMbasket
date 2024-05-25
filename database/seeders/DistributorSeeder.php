<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistributorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("distributors")->insert([
            'id_distributor'=>'1',
            'nama_distributor' =>'lcd',
            'alamat_distributor'=>'slsskksslsl',
            'no_Hp_distributor'=>'0099087778',
            'created_at'=>NULL,
            'updated_at'=>NULL
        ]);
    }
}
