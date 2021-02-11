<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContractResource;
use App\Http\Resources\StUserResource;
use App\Models\Contract;
use App\Models\Done_job;
use App\Models\Job;
use App\Models\Payment;
use App\Models\Proposal;
use App\Models\Review;
use App\Models\StUser;
use App\Models\User;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Http;
use PDF;

class PlaygroundController extends Controller
{
    public function playground()
    {
        $faker = Faker::create('id_ID');

        $contract_dones = ContractResource::collection(
            Contract::whereIn('number_contract', function ($query) {
                $query->select('job_number_contract')
                    ->from('payments')->where('payment_status', 'settlement');
            })
                ->get()
        );
        $contract_dones = json_decode(json_encode($contract_dones));
        foreach ($contract_dones as $contract_done) {
            $contract = Contract::find($contract_done->id);
            // dd($contract);

            // user
            $user_review = Review::create([
                'star' => rand(0, 5),
                'review_description' => $faker->text,
                'from_id' => $contract_done->user->id,
                'to_id' => $contract_done->st_user->user->id,
                'is_seeder' => 1,
            ]);

            // st_user
            $st_user_review = Review::create([
                'star' => rand(0, 5),
                'review_description' => $faker->text,
                'to_id' => $contract_done->user->id,
                'from_id' => $contract_done->st_user->user->id,
                'is_seeder' => 1,
            ]);

            $contract->user_review_id = $user_review->id;
            $contract->st_user_review_id = $st_user_review->id;
            $contract->save();
        }
    }

    public function generateDoneJob()
    {
        $faker = Faker::create('id_ID');

        $contracts = Contract::where('done_job_id', null)->get();

        foreach ($contracts as $contract) {
            $status = 'rejected';
            while ($status == 'rejected') {
                $status = Done_job::STATUS[rand(0, 2)];
                // dd($status);
                if ($status == 'rejected') {
                    $rejected_descrition = $faker->text(160);
                } else {
                    $rejected_descrition = null;
                }

                $done_job = Done_job::create([
                    'job_id' => $contract->job_id,
                    'is_seeder' => 1,
                    'status' => $status,
                    'url' => $faker->url,
                    'reject_description' => $rejected_descrition ?? null,
                ]);
            }

            $contract->done_job_id = $done_job->id;
            $contract->save();
        }
    }

    public function generatePayment()
    {
        $contracts = ContractResource::collection(Contract::where('payment_id', null)->limit(10)->get());
        $contracts = json_decode(json_encode($contracts));
        foreach ($contracts as $contract) {
            // dd($contract);
            $payment = Payment::create([
                'is_seeder' => 1,
                'payment_id' => 'PY-' . $contract->number_contract,
                'payment_status' => Payment::STATUS[rand(0, 4)],
                'payment_type' => Payment::TYPES[rand(0, 14)],
                'customer_name' => $contract->user->name,
                'customer_last_name' => $contract->user->last_name ?? '',
                'customer_email' => $contract->user->email ?? '',
                'job_number_contract' => $contract->number_contract,
                'job_name' => $contract->job->name_job,
                'job_category' => $contract->job->service_need ?? '',
                'gross_amount' => $contract->price
            ]);
            // dd($payment->id);
            $temp = Contract::find($contract->id);
            $temp->payment_id = $payment->id;
            $temp->save();
        }
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
        dd($contract);
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
