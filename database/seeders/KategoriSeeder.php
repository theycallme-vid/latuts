<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori; // TAMBAHKAN UNTUK ELOQUENT INSERT

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $dataku = [
            ['nama' => 'Makanan Berat',        'deskripsi' => 'makanan yang mengenyangkan seperti nasi dan lauk'],
            ['nama' => 'Makanan Ringan',        'deskripsi' => 'cemilan enak untuk bersantai'],
            ['nama' => 'Jus',                   'deskripsi' => 'minuman segar berbahan dasar buah'],
            ['nama' => 'Soda',                  'deskripsi' => 'minuman berkarbonasi yang menyegarkan'],
            ['nama' => 'Susu',                  'deskripsi' => 'minuman sehat dan bergizi'],
            ['nama' => 'Kopi',                  'deskripsi' => 'minuman kopi arabika dan robusta'],
            ['nama' => 'Teh',                   'deskripsi' => 'minuman teh panas dan dingin'],
            ['nama' => 'Jajanan Pasar',         'deskripsi' => 'kue-kue tradisional nusantara'],
            ['nama' => 'Gorengan',              'deskripsi' => 'aneka gorengan renyah dan gurih'],
            ['nama' => 'Minuman Tradisional',   'deskripsi' => 'minuman herbal dan tradisional']
        ];

        Kategori::insert($dataku); // insert data kategori ke database
    }
}
