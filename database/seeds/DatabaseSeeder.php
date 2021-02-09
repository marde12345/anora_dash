<?php

use App\Models\St_user;
use Database\Seeders\ContractSeeder;
use Database\Seeders\DoneJobSeeder;
use Database\Seeders\JobSeeder;
use Database\Seeders\PaymentSeeder;
use Database\Seeders\ProposalSeeder;
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
            St_user::class,
            JobSeeder::class,
            ContractSeeder::class,
            DoneJobSeeder::class,
            PaymentSeeder::class,
            ProposalSeeder::class,
        ]);
    }
}
