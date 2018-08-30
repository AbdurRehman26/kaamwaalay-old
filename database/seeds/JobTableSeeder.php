<?php

use Illuminate\Database\Seeder;
use App\Data\Models\Role;
use Faker\Factory;

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

        for ($i=0; $i < $numberOfJobs; $i++) { 
            $user = app('UserRepository')->model->where('role_id' , Role::CUSTOMER)->inRandomOrder()->first();
            $service = app('ServiceRepository')->model->inRandomOrder()->first();
            $country_id = 231; // USA 
            
            $state = app('StateRepository')->model->inRandomOrder()->first();
            
            $city = app('UserRepository')->model->where('state_id' , $state->id)->inRandomOrder()->first();

            if($user && $service){
                $data[] = [
                    'user_id' => $user->id,
                    'service_id' => $service->id,
                    'title' => $faker->Company,
                    'description' => $faker->Text,
                    'address' => $faker->Address,
                    'zip_code' => mt_rand(10000, 99999),
                    'country_id' => $country_id,
                    'state_id' => $state->id,
                    'city_id' => $city ? $city->id : null,
                ];
            }

        }

        app("JobRepository")->model->insert($data);

    }   
}
