<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class UserRatingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        echo "\nThis Seeder requires Jobs and Job Bids to be present in data base.\n"; 


        $faker = Faker\Factory::create();
        $now = Carbon::now()->toDateTimeString();


        $jobBids = app('JobBidRepository')->model->join('jobs' , 'jobs.id' , 'job_bids.job_id')->where('is_awarded' , 1)->where('jobs.status' , 'completed')
        ->inRandomOrder()
        ->get(['jobs.user_id as customer_user_id' , 'job_bids.id', 'job_bids.id', 'job_bids.job_id', 'job_bids.user_id as service_provider_user_id']);

        $ratings = [0, 1, 3, 4, 5];


        if(!empty($jobBids)){
            $data = [];
            foreach ($jobBids as $key => $bid) {
                $data[] = [
                    'id' => $key,
                    'job_id' => $bid->job_id,
                    'user_id' => $bid->service_provider_user_id,
                    'rated_by' => $bid->customer_user_id,
                    'rating' => $ratings[array_rand($ratings)],
                    'status' => 'approved',
                    'message' => $faker->Text,
                    'created_at' => $now,
                    'updated_at' => $now

                ];

            }

            app('UserRatingRepository')->model->insertOnDuplicateKey($data);

        }
    }
}
