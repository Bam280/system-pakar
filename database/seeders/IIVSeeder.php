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

        $data = [
            [
                'nama' => 'SRIKANDI',
                'ref_instansi_id' => 1,
                'nilai_risiko' => 11.5,
            ],
            [
                'nama' => 'SPSE',
                'ref_instansi_id' => 2,
                'nilai_risiko' => 9.5,
            ],
            [
                'nama' => 'S4N Lapor',
                'ref_instansi_id' => 3,
                'nilai_risiko' => 7.5,
            ],
        ];

        foreach ($data as $iiv) {
            IIV::create([
                'nama' => $iiv['nama'],
                'ref_instansi_id' => $iiv['ref_instansi_id'],
                'nilai_risiko' => $iiv['nilai_risiko'],
            ]);
        }
    }
}
