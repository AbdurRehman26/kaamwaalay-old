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

        echo "\nThis Seeder requires Jobs to be present in data base.\n"; 

        $faker = Faker\Factory::create();

        $data = [];

        $totalJobs = 1000;

        $totalCustomers = 150;

        $totalBids = 5;

        $jobs = app('JobRepository')->model->limit($totalJobs)->get();

        $customers = app('UserRepository')->model->where('role_id' , Role::CUSTOMER)->inRandomOrder()->limit($totalCustomers)->pluck('id')->toArray();

        // to reduce the possibility of archive happening

        $jobBidStatuses = ['pending', 'pending', 'completed'];


        foreach ($jobs as $key => $job) {
            
            $randomValues = [0, 0, 0, 0, 0, 1];

            for ($i = 0 ; $i < $totalBids; $i++) {

                $isAwarded = $randomValues[array_rand($randomValues)];
                $isArchived = $randomValues[array_rand($randomValues)];
                $isTbd = $randomValues[array_rand($randomValues)];
                $isInvited = $randomValues[array_rand($randomValues)];

                $status = 'pending';
            
                if($isAwarded){
                    
                    // unsetting the last value so it wont make any other bid awared ( Boom )
                    
                    unset($randomValues[sizeof($randomValues)-1]);

                    // updating the job to be awarded  ( there is a small hitch . each time seeder runs it will reset jobs' status)
                    
                    $status = $jobBidStatuses[array_rand($jobBidStatuses)];
                    $jobStatus = $status  == 'pending' ? 'awarded' : 'completed';

                    $updateData = ['id' => $job->id, 'status'=> $jobStatus];

                    app('JobRepository')->update($updateData);
                

                }


                $amount = mt_rand(0, 150000);

                $bidData = [
                    'description' => $faker->Text,
                    'amount' => $amount,
                    'is_tbd' => $isTbd,
                    'job_id' => $job->id,
                    'is_awarded' => $isAwarded,
                    'is_archived' => $isArchived,
                    'is_invited' => $isInvited,
                    'user_id' => $customers[array_rand($customers)],
                    'status' => $status
                ];

                if($isTbd){
                    $bidData['amount'] = null;
                }

                $data[] = $bidData;
            }

        }

        app("JobBidRepository")->model->insert($data);

        if(!empty($jobs)){
            echo "\nJob Bids added successfully.\n"; 

        }


    }   
}
