<?php

namespace Database\Seeders;

use app\Models\Risiko;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RisikoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Risiko:create([
            "id_tujuan" => 1,
            "deskripsi_risiko" => "Risiko 1",
            "deskripsi_dampak" => "Deskripsi Dampak 1",
            "deskripsi_kemungkinan" => "Deskripsi Kemungkinan 1",
            "ref_dampak_id" => 1,
            "ref_kemungkinan_id" => 1,
            "nilai_dampak_regional" => 3,
            "nilai_dampak_nasional" => 5,
            "nilai_kemungkinan" => 1
        ]);
    }
}
