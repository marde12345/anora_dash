<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class PlaygroundController extends Controller
{
    public function playground()
    {
        $users = User::where('role', 'customer')->get();
        $faker = Faker::create('id_ID');
        $res = [];

        for ($i = 0; $i < 20; $i++) {
            $user_rand_id = rand(0, count($users) - 1);
            $tool_count = rand(0, count(Job::TOOLS) - 1);
            $service_count = rand(0, count(Job::SERVICES) - 1);
            $tools = [];
            $services = [];

            for ($j = 0; $j < $tool_count; $j++) {
                $temp = Job::TOOLS[rand(0, count(Job::TOOLS) - 1)];
                if (!in_array($temp, $tools)) {
                    array_push($tools, $temp);
                }
            }
            for ($j = 0; $j < $service_count; $j++) {
                $temp = Job::SERVICES[rand(0, count(Job::SERVICES) - 1)];
                if (!in_array($temp, $services)) {
                    array_push($services, $temp);
                }
            }

            $type = Job::TYPES[rand(0, count(Job::TYPES) - 1)];
            $level_need = Job::LEVELS[rand(0, count(Job::LEVELS) - 1)];
            $tool_need = implode('|', $tools);
            $service_need = implode('|', $services);

            array_push($res, [
                'user_id' => $users[$user_rand_id]->id,
                'created_at' => $faker->dateTimeBetween('-3 months', 'now'),
                'updated_at' => $faker->dateTimeBetween('-3 months', 'now'),
                'status' => 'baru',
                'type' => $type,
                'level_need' => $level_need,
                'tool_need' => $tool_need,
                'service_need' => $service_need,
                'name_job' => $faker->jobTitle,
                'description' => $faker->text,
                'open_price' => $faker->numberBetween(100000, 10000000),
                'duration' => $faker->randomNumber(2),
                'is_home_service' => rand(0, 1),

                'is_seeder' => 1,
            ]);
        }

        dd($res);
    }
}
