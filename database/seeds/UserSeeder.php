<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@pdm.id',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Sekretaris',
            'email' => 'sekretaris@pdm.id',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('sekretaris');

    }
}
