<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            unitSeeder::class,
            // anggotaSeeder::class,
            kegiatanSeeder::class,
            statuspublikasiSeeder::class,
        ]);
    }
}
