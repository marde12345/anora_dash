<?php

use Database\Seeders\UserSeeder;
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
        // $this->call(UsersTableSeeder::class);
        // $user = factory(\App\User::class, 10)->make();
        $this->call([
            UserSeeder::class,
        ]);
    }
}
