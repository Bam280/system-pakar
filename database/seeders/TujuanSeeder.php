<?php

namespace Database\Seeders;

use App\Models\Tujuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TujuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'iiv_id' => 1,
                'ref_tujuan_id' => 1,
                'deskripsi_tujuan' => 'Tujuan 1'
            ]
        ];

        foreach ($data as $tujuan) {
            Tujuan::create([
                'iiv_id' => $tujuan['iiv_id'],
                'ref_tujuan_id' => $tujuan['ref_tujuan_id'],
                'deskripsi_tujuan' => $tujuan['deskripsi_tujuan']
            ]);
        }
    }
}
