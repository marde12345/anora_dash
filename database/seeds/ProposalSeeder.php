<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Proposal;
use App\Models\St_user;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class ProposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobs = Job::where('type', 'open')->get();
        $st_users = St_user::all();
        $faker = Faker::create('id_ID');
        $res = [];

        foreach ($jobs as $job) {
            $proposal_count = rand(0, 10);

            for ($i = 0; $i < $proposal_count; $i++) {
                $st_user = $st_users[rand(0, count($st_users) - 1)];
                // $st_user = new StUserResource(St_user::inRandomOrder()->first());
                // dd(json_decode(json_encode($st_user)));

                $status = Proposal::STATUS[rand(0, count(Proposal::STATUS) - 1)];
                switch ($status) {
                    case 'rejected':
                        $answer_job = $faker->text;
                        break;

                    default:
                        $answer_job = '-';
                        break;
                }

                $bid_price = $faker->numberBetween(0, $job->open_price);

                array_push($res, [
                    'job_id' => $job->id,
                    'st_user_id' => $st_user->id,
                    'status' => $status,
                    'answer_job' => $answer_job,
                    'bid_price' => $bid_price,
                    'cover_letter' => $faker->text,
                    'is_seeder' => 1,
                ]);
            }
        }

        // dd($res);
        Proposal::insert($res);
    }
}
