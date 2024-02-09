<?php

namespace Database\Seeders;

use App\Models\RefInterdepen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RefInterdepenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Kesamaan Aset Fisik',
        ];

        foreach ($data as $interdepen) {
            RefInterdepen::create([
                'indikator_interdepen' => $interdepen,
            ]);
        }
    }
}
