<?php

namespace Database\Seeders;

use App\Models\IIV;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IIVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IIV::create([
            'nama' => 'Sistem Informasi Akademik',
            'ref_instansi_id' => 2,
            'nilai_risiko' => 15,
        ]);

        IIV::create([
            'nama' => 'Sistem Informasi Keuangan',
            'ref_instansi_id' => 1,
            'nilai_risiko' => 8,
        ]);
    }
}
