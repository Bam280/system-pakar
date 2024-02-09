<?php

namespace Database\Seeders;

use App\Models\Risiko;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RisikoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'tujuan_id' => 1,
                'deskripsi_risiko' => 'Risiko 1',
                'deskripsi_dampak' => 'Deskripsi Dampak 1',
                'deskripsi_kemungkinan' => 'Deskripsi Kemungkinan 1',
                'ref_dampak_id' => 1,
                'nilai_dampak_regional' => 3,
                'nilai_dampak_nasional' => 5,
                'nilai_kemungkinan' => 1
            ]
        ];

        foreach ($data as $risiko) {
            Risiko::create([
                'tujuan_id' => $risiko['tujuan_id'],
                'deskripsi_risiko' => $risiko['deskripsi_risiko'],
                'deskripsi_dampak' => $risiko['deskripsi_dampak'],
                'deskripsi_kemungkinan' => $risiko['deskripsi_kemungkinan'],
                'ref_dampak_id' => $risiko['ref_dampak_id'],
                'nilai_dampak_regional' => $risiko['nilai_dampak_regional'],
                'nilai_dampak_nasional' => $risiko['nilai_dampak_nasional'],
                'nilai_kemungkinan' => $risiko['nilai_kemungkinan']
            ]);
        }
    }
}
