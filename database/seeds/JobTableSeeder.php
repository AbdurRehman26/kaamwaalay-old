<?php

use Illuminate\Database\Seeder;
use App\Data\Models\Role;
use Faker\Factory;
use Carbon\Carbon;

class JobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        $faker = Faker\Factory::create();
        
        $numberOfJobs = 1500;

        $data = [];

        $jobType = ['normal' , 'urgent'];

        for ($i=1; $i < $numberOfJobs; $i++) { 

            $user = app('UserRepository')->model->where('role_id' , Role::CUSTOMER)->inRandomOrder()->first();
            $service = app('ServiceRepository')->model->inRandomOrder()->first();
            $country_id = 231; // USA 
            
            $state = app('StateRepository')->model->inRandomOrder()->first();
            
            $city = app('CityRepository')->model->where('state_id' , $state->id)->inRandomOrder()->first();

            $preferences = ['choose_date', 'any_time', 'few_days', 'with_in_a_week'];


            $min_amount = [mt_rand(1000 , 200000), null];
            $max_amount = [mt_rand($min_amount[0] , $min_amount[0] * 3) , null];

            if($user && $service){

                $preference = $preferences[array_rand($preferences)];

                $scheduled_at = $preference == 'choose_date' ? Carbon::now()->toDateString() : null;

                $data[] = [
                    'id' => $i,
                    'user_id' => $user->id,
                    'service_id' => $service->id,
                    'title' => $faker->Company,
                    'description' => $faker->Text,
                    'address' => $faker->Address,
                    'zip_code' => mt_rand(10000, 99999),
                    'country_id' => $country_id,
                    'state_id' => $state->id,
                    'city_id' => $city ? $city->id : null,
                    'job_type' => $jobType[array_rand($jobType)],
                    'preference' => $preference, 
                    'schedule_at' => $scheduled_at,
                    'min_amount' => $min_amount[array_rand($min_amount)],
                    'max_amount' => $max_amount[array_rand($max_amount)]
                ];

            }

        }

        app("JobRepository")->model->insertOnDuplicateKey($data);

    }   
}
