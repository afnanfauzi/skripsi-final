<?php

use App\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create([
            'nama_jabatan' => 'Ketua',
            'status' => 'Aktif'
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Wakil Ketua',
            'status' => 'Aktif'
        ]);
        Jabatan::create([
            'nama_jabatan' => 'Sekretaris',
            'status' => 'Aktif'
        ]);
        Jabatan::create([
            'nama_jabatan' => 'Wakil Sekretaris',
            'status' => 'Aktif'
        ]);
        Jabatan::create([
            'nama_jabatan' => 'Bendahara',
            'status' => 'Aktif'
        ]);
        Jabatan::create([
            'nama_jabatan' => 'Wakil Bendahara',
            'status' => 'Aktif'
        ]);
        // Jabatan::create([
        //     'nama_jabatan' => 'Anggota'
        // ]);
    }
}
