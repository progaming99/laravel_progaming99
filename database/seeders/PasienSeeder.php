<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('pasiens')->insert([
            [
                'nama_pasien' => 'Maida',
                'alamat' => 'Cilacap',
                'no_telepon' => '08123456789',
                'id_rumah_sakit' => 1
            ],
            [
                'nama_pasien' => 'Budi',
                'alamat' => 'Semarang',
                'no_telepon' => '08234567890',
                'id_rumah_sakit' => 2
            ],
        ]);
    }
}