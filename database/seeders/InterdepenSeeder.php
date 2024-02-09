<?php

namespace Database\Seeders;

use App\Models\Interdepen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterdepenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'ref_interdepen_id' => 1,
                'sistem_elektronik_id' => 1,
                'sistem_iiv_id' => 2,
                'deskripsi_interdepen' => 'Interdepen 1'
            ]
        ];

        foreach ($data as $interdepen) {
            Interdepen::create([
                'ref_interdepen_id' => $interdepen['ref_interdepen_id'],
                'sistem_elektronik_id' => $interdepen['sistem_elektronik_id'],
                'sistem_iiv_id' => $interdepen['sistem_iiv_id'],
                'deskripsi_interdepen' => $interdepen['deskripsi_interdepen']
            ]);
        }
    }
}
