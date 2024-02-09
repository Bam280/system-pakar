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
        RefInstansi::create([
            'nama_instansi' => 'Kementerian Pendidikan dan Kebudayaan',
        ]);
        RefInstansi::create([
            'nama_instansi' => 'Polri',
        ]);
    }
}
