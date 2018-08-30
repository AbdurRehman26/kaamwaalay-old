<?php

use Illuminate\Database\Seeder;
use App\Data\Models\Role;
use Faker\Factory;

class JobBidTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        $data = [];

        $totalJobs = 10;

        $totalCustomers = 150;

        $totalBids = 5;

        $jobs = app('JobRepository')->model->limit($totalJobs)->get();

        $customers = app('UserRepository')->model->where('role_id' , Role::CUSTOMER)->inRandomOrder()->limit($totalCustomers)->pluck('id')->toArray();

        foreach ($jobs as $key => $job) {

            for ($i = 0 ; $i < $totalBids; $i++) {


                $amount = mt_rand(0 , 150000);

                $isTbd = mt_rand(0 , 1);

                $bidData = [
                    'description' => $faker->Text,
                    'amount' => $amount,
                    'is_tbd' => $isTbd,
                    'job_id' => $job->id,
                    'is_awarded' => 0,
                    'is_invited' => 0,
                    'user_id' => $customers[array_rand($customers)],
                ];

                if($isTbd){
                    $bidData['amount'] = null;
                }

                $data[] = $bidData;
            }

        }

        app("JobBidRepository")->model->insert($data);

    }   
}
