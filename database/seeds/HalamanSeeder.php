<?php

use App\Halaman;
use Illuminate\Database\Seeder;

class HalamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Halaman::create([
            'judul' => 'Sejarah',
            'slug' => 'sejarah',
            'isi' => '',
            'statuspublikasi' => 'Ya',
            'menu' => 'Ya',
            'penulis' => 'Admin',
        ]);

        Halaman::create([
            'judul' => 'Struktur Organisasi',
            'slug' => 'sruktur-organisasi',
            'isi' => '',
            'statuspublikasi' => 'Ya',
            'menu' => 'Ya',
            'penulis' => 'Admin',
        ]);
        Halaman::create([
            'judul' => 'Visi Misi',
            'slug' => 'visi-misi',
            'isi' => '',
            'statuspublikasi' => 'Ya',
            'menu' => 'Ya',
            'penulis' => 'Admin',
        ]);
        Halaman::create([
            'judul' => 'Program Kerja',
            'slug' => 'program-kerja',
            'isi' => '',
            'statuspublikasi' => 'Ya',
            'menu' => 'Ya',
            'penulis' => 'Admin',
        ]);
        Halaman::create([
            'judul' => 'Majelis',
            'slug' => 'majelis',
            'isi' => '',
            'statuspublikasi' => 'Ya',
            'menu' => 'Ya',
            'penulis' => 'Admin',
        ]);
        Halaman::create([
            'judul' => 'Lembaga',
            'slug' => 'lembaga',
            'isi' => '',
            'statuspublikasi' => 'Ya',
            'menu' => 'Ya',
            'penulis' => 'Admin',
        ]);
        Halaman::create([
            'judul' => 'PCM',
            'slug' => 'pcm',
            'isi' => '',
            'statuspublikasi' => 'Ya',
            'menu' => 'Ya',
            'penulis' => 'Admin',
        ]);
        Halaman::create([
            'judul' => 'Ortom',
            'slug' => 'ortom',
            'isi' => '',
            'statuspublikasi' => 'Ya',
            'menu' => 'Ya',
            'penulis' => 'Admin',
        ]);
    }
}
