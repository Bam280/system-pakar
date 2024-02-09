<?php

namespace Database\Seeders;

use App\Models\RefFungsi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RefFungsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Mencegah permasalahan keamanan',
        ];

        foreach ($data as $fungsi) {
            RefFungsi::create([
                'indikator_fungsi' => $fungsi,
            ]);
        }
    }
}
