<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_obat')->insert([
            [
                'jenis' => 'Obat Bebas',
                'deskripsi_jenis' => 'Obat bertanda lingkaran hijau yang dapat dibeli tanpa resep dokter.',
                'image_url' => 'bebas.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis' => 'Obat Bebas Terbatas',
                'deskripsi_jenis' => 'Obat bertanda lingkaran biru, dapat dibeli tanpa resep tapi dengan peringatan.',
                'image_url' => 'terbatas.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis' => 'Obat Keras',
                'deskripsi_jenis' => 'Obat bertanda lingkaran merah (K) yang wajib menggunakan resep dokter.',
                'image_url' => 'keras.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}