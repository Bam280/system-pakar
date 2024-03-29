<?php

namespace Database\Seeders;

use App\Models\RefInstansi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RefInstansiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'ANRI',
            'LKPP',
            'KSP',
        ];

        foreach ($data as $instansi) {
            RefInstansi::create([
                'nama_instansi' => $instansi,
            ]);
        }
    }
}
