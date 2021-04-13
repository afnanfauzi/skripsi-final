<?php

use Illuminate\Database\Seeder;
use App\Kegiatan;

class kegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Kegiatan::class, 20)->create();
    }
}
