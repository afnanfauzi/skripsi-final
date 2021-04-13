<?php

use Illuminate\Database\Seeder;

class anggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Anggota::class, 20)->create();
    }
}
