<?php

namespace Database\Seeders;

use app\Models\Kendali;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KendaliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kendali::create([
            "id_risiko" => 1,
            "nama_kendali" => "Kendali 1",
            "deskripsi_kendali" => "Deskripsi Kendali 1",
            "ref_fungsi_id" => 1
        ]);
    }
}
