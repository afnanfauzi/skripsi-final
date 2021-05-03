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
            'nama_jabatan' => 'Ketua'
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Wakil Ketua'
        ]);
        Jabatan::create([
            'nama_jabatan' => 'Sekretaris'
        ]);
        Jabatan::create([
            'nama_jabatan' => 'Wakil Sekretaris'
        ]);
        Jabatan::create([
            'nama_jabatan' => 'Bendahara'
        ]);
        Jabatan::create([
            'nama_jabatan' => 'Wakil Bendahara'
        ]);
        // Jabatan::create([
        //     'nama_jabatan' => 'Anggota'
        // ]);
    }
}
