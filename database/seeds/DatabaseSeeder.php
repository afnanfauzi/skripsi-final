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
        // $this->call([
        //     unitSeeder::class,
        //     // anggotaSeeder::class,
        //     kegiatanSeeder::class,
        //     statuspublikasiSeeder::class,
        // ]);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(JabatanSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(HalamanSeeder::class);
        
    }
}
