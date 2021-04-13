<?php

use Illuminate\Database\Seeder;
use App\Unit;

class unitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Unit::class, 20)->create();
    }
}
