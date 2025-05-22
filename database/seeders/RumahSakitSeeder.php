<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RumahSakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rumah_sakit')->insert([
            [
                'nama_rumah_sakit' => 'RS Harapan Sehat',
                'alamat' => 'Jl. Kesehatan No. 1',
                'email' => 'info@harapansehat.com',
                'telepon' => '0211234567'
            ],
            [
                'nama_rumah_sakit' => 'RS Aman Sentosa',
                'alamat' => 'Jl. Damai No. 2',
                'email' => 'contact@amansentosa.com',
                'telepon' => '0217654321'
            ],
        ]);
    }
}