<?php

use Illuminate\Database\Seeder;

class statuspublikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\StatusPublikasi::class, 2)->create();
    }
}
