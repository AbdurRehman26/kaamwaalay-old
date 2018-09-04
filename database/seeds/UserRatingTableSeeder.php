<?php

use Illuminate\Database\Seeder;
use App\Data\Models\Role;
use Faker\Factory;

class UserRatingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker\Factory::create();
        
        $numberOfJobs = 10;

        $data = [];

        for ($i=0; $i < $numberOfJobs; $i++) {
            $user = app('UserRepository')->model->where('role_id' , Role::CUSTOMER)->inRandomOrder()->first();
            $rated_by = app('UserRepository')->model->where('role_id' , Role::CUSTOMER)->inRandomOrder()->first();
            $service = app('ServiceProviderServiceRepository')->model->inRandomOrder()->first();
            $job = app('JobRepository')->model->inRandomOrder()->first();

            if($user && $service){
                $data[] = [
                	'rating' => rand (0, 5),
                    'message' => $faker->sentence,
                    'job_id' => $job->id,
                    'user_service_id' => $service->id,
                    'user_id' => $user->id,
                    'rated_by' => $rated_by->id,
                    'status' => 'approved',
                ];
            }

        }

        app("UserRatingRepository")->model->insert($data);

    }
}
