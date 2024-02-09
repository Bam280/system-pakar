<?php

namespace Database\Seeders;

use app\Models\Tujuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TujuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tujuan::create([
            "id_iiv" => 1,
            "ref_tujuan_id" => 1,
            "deskripsi_tujuan" => "Tujuan 1"
        ]);
    }
}
