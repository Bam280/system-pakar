<?php

namespace Database\Seeders;

use App\Models\RefDampak;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RefDampakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Organisasi',
            'Nasional',
        ];

        foreach ($data as $dampak) {
            RefDampak::create([
                'indikator_dampak' => $dampak,
            ]);
        }
    }
}
