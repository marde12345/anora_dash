<?php

namespace App\Http\Controllers;

use App\Http\Resources\StUserResource;
use App\Models\Contract;
use App\Models\Job;
use App\Models\Proposal;
use App\Models\St_user;
use App\Models\User;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class PlaygroundController extends Controller
{
    public function playground()
    {
        $faker = Faker::create('id_ID');

        $proposals = Proposal::where('proposals.status', 'accepted')
            ->join('jobs', 'jobs.id', '=', 'proposals.job_id')
            ->select(
                'proposals.id as proposal_id',
                'proposals.st_user_id',
                'proposals.bid_price as price',
                'jobs.*'
            )
            ->get();
        $res = [];

        foreach ($proposals as $proposal) {
            $created_at = now();
            $number_contract = implode('/', [
                $created_at->year,
                Contract::integerToRoman($created_at->month),
                $created_at->day,
                'id-' . $proposal->id,
                str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT)
            ]);
            // dd($number_contract);
            array_push($res, [
                'job_id' => $proposal->id,
                'user_id' => $proposal->user_id,
                'st_user_id' => $proposal->st_user_id,
                'price' => $proposal->price,
                'barcode' => $faker->uuid,
                'number_contract' => $number_contract,

                'is_seeder' => 1
            ]);
        }

        // dd($res);
        // Contract::insert($res);
    }
}
