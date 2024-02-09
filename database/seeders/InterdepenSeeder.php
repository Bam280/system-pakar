<?php

namespace Database\Seeders;

use app\Models\Interdepen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterdepenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Interdepen::create([
            "ref_interdepen_id" => 1,
            "id_iiv" => 1,
            "sistem_terhubung" => 1,
            "deskripsi_interdepen" => "Interdepen 1"
        ]);
    }
}
