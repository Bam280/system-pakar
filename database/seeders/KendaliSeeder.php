<?php

namespace Database\Seeders;

use App\Models\Kendali;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KendaliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'risiko_id' => 1,
                'nama_kendali' => 'Kendali 1',
                'deskripsi_kendali' => 'Deskripsi Kendali 1',
                'ref_fungsi_id' => 1
            ]
        ];

        foreach ($data as $kendali) {
            Kendali::create([
                'risiko_id' => $kendali['risiko_id'],
                'nama_kendali' => $kendali['nama_kendali'],
                'deskripsi_kendali' => $kendali['deskripsi_kendali'],
                'ref_fungsi_id' => $kendali['ref_fungsi_id']
            ]);
        }
    }
}
