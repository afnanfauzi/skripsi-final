<?php

use Illuminate\Database\Seeder;
use App\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Unit::class, 20)->create();
        Unit::create([
            'nama_unit' => 'Pimpinan Daerah Muhammadiyah Kabupaten',
            'status' => 'Aktif'
        ]);
        Unit::create([
            'nama_unit' => 'Pimpinan Cabang Muhammadiyah',
            'status' => 'Aktif'
        ]);
        Unit::create([
            'nama_unit' => 'Pimpinan Ranting Muhammadiyah',
            'status' => 'Aktif'
        ]);
        Unit::create([
            'nama_unit' => 'Majelis Tarjih dan Tajdid',
            'status' => 'Aktif'
        ]);
    }
}
