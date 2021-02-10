<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContractResource;
use App\Http\Resources\StUserResource;
use App\Models\Contract;
use App\Models\Job;
use App\Models\Proposal;
use App\Models\StUser;
use App\Models\User;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Http;
use PDF;

class PlaygroundController extends Controller
{
    public function playground($name_code)
    {
        $name_code = explode('_', $name_code);
        $st_user = new StUserResource(StUser::find($name_code[0]));
        $st_user = json_decode(json_encode($st_user));
        dd($st_user);

        $widget = [
            'title' => "Home",
            'st_user' => $st_user,
        ];

        return view('home.statistisi-portofolio', compact('widget'));
    }
    public function generateNameAndImageUrl()
    {
        $faker = Faker::create('id_ID');
        $users = User::where('is_seeder')->get();

        foreach ($users as $user) {
            $user->name = $faker->name;
            $user->last_name = $faker->lastName;
            $user->photo_url = (!$user->photo_profile_id ? $faker->imageUrl() : null);
            // dd($user->photo_url);
            $user->save();
        }

        return $faker->name;
    }
    public function updateLongLatUser()
    {
        $faker = Faker::create('id_ID');

        $users = User::where('city', '')->get();
        $res = [];

        foreach ($users as $user) {
            $user->longitude = $faker->longitude(111.6748654, 112.860732);
            $user->latitude = $faker->latitude(-8.339140, -6.897179);
            $data_osm = Http::get("https://nominatim.openstreetmap.org/reverse?format=json&lat=$user->latitude&lon=$user->longitude");
            $data_osm_json = $data_osm->json();
            $user->city = $data_osm_json['address']['county'] ?? '';
            $user->state = $data_osm_json['address']['state'] ?? '';
            $user->country = $data_osm_json['address']['country'] ?? '';
            // dd($user);
            $user->save();
        }
        // dd($res);
    }

    public function getRandomContract()
    {
        // return new ContractResource(Contract::inRandomOrder()->first());
        return $this->createContract(new ContractResource(Contract::inRandomOrder()->first()));
    }

    public function createContract(ContractResource $contractResource)
    {
        // dd($contractResource->created_at->isoFormat('dddd, D MMMM Y'));
        $contract = json_decode(json_encode($contractResource));
        $widget = [
            'title' => 'Home',
            'contract' => $contract
        ];
        // dd($widget);
        $pdf = PDF::loadView('laporan/perjanjian_kerjasama', compact('widget'));
        // return $pdf->download('laporan-pdf.pdf');
        return $pdf->stream();
    }

    public function contractSeeder()
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
