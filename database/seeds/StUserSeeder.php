<?php

namespace Database\Seeders;

use App\Models\St_user;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class StUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $tools = ['SPSS', 'Python', 'R'];
    private $services = ['Analisis Regresi', 'Olah Data', 'Data Entry', 'Pembuatan Kuisioner', 'Konsultasi Statistik'];

    public function run()
    {
        $users = User::where('role', 'st_user')->get();
        $faker = Faker::create('id_ID');

        foreach ($users as $st_user) {
            $tools_count = rand(0, 4);
            $services_count = rand(0, 8);
            $tools = [];
            $services = [];

            for ($i = 0; $i < $tools_count; $i++) {
                $temp = $this->tools[rand(0, 2)];
                if (!in_array($temp, $tools)) {
                    array_push($tools, $temp);
                }
            }

            for ($i = 0; $i < $services_count; $i++) {
                $temp = $this->services[rand(0, 4)];
                if (!in_array($temp, $services)) {
                    array_push($services, $temp);
                }
            }

            St_user::create([
                'user_id' => $st_user->id,
                'level' => rand(0, 100),
                'cover_letter' => $faker->text,
                'visitor_count' => rand(0, 10000),
                'tools' => implode('|', $tools),
                'services' => implode('|', $services),
                'is_seeder' => 1,
            ]);
        }
    }
}
