<?php

namespace Database\Seeders;

use App\Models\RefTujuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RefTujuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Memastikan aset fisik dan logis hanya dapat dilihat oleh pihak yang berwenang',
        ];

        foreach ($data as $tujuan) {
            RefTujuan::create([
                'tujuan_keamanan' => $tujuan,
            ]);
        }
    }
}
