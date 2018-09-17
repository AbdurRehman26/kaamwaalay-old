<?php

use Illuminate\Database\Seeder;
use App\Data\Models\Role;
use App\Data\Models\User;
use Faker\Factory;
use Carbon\Carbon;

class JobBidTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $now = Carbon::now()->toDateTimeString();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('job_bids')->truncate();

        echo "\nThis Seeder requires Jobs to be present in data base.\n"; 

        $faker = Faker\Factory::create();

        $data = [];

        $totalJobs = 200;

        $totalCustomers = 150;

        $totalBids = 3;

        $jobs = app('JobRepository')->model->limit($totalJobs)->get();

        $customers = app('UserRepository')
        ->model->where('role_id' , Role::SERVICE_PROVIDER)
        ->inRandomOrder()->limit($totalCustomers)->pluck('id')->toArray();

        // to reduce the possibility of archive happening

        $jobBidStatuses = ['pending', 'pending', 'pending', 'initiated', 'completed'];


        foreach ($jobs as $key => $job) {

            $breakLoop = false;
            
            $randomValues = [0, 0, 0, 0, 0, 0, 0, 1];

            for ($i = 0 ; $i < $totalBids; $i++) {

                if($breakLoop){
                    continue;
                }


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

                    $jobStatus = $status  == 'pending' ? 'awarded' : $status;                    

                    $updateData = ['id' => $job->id, 'status'=> $jobStatus, 'updated_at' => $now];

                    app('JobRepository')->update($updateData);
                    
                }


                $amount = mt_rand(0, 150000);

                $bidData = [
                    'description' => $faker->Text,
                    'amount' => $amount,
                    'is_tbd' => $isTbd,
                    'job_id' => $job->id,
                    'is_awarded' => !$isTbd ? $isAwarded : 0,
                    'is_archived' => $isArchived,
                    'is_invited' => $isInvited,
                    'user_id' => $customers[array_rand($customers)],
                    'status' => !$isTbd ? $status : 'pending',
                    'created_at' => $now,
                    'updated_at' => $now
                ];

                if($isTbd){
                    $bidData['amount'] = null;
                }

                $data[] = $bidData;

                if(!empty($jobStatus)){
                    if($jobStatus == 'completed' || $jobStatus == 'initiated'){
                        $breakLoop = true;
                        continue;
                    }            
                }


            }

        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        app("JobBidRepository")->model->InsertOnDuplicateKey($data);

        if(!empty($jobs)){

            // safe side remarking jobs statuses 


            $criteria = ['filter_by_status' => 'initiated'];
            $initiatedJobs = app("JobRepository")->findByAll(false, 10, $criteria);

            if($initiatedJobs['data']){

                $data = [];
                foreach ($initiatedJobs['data'] as $key => $initiatedJob) {

                    $criteria = ['job_id' => $initiatedJob->id, 'status' => 'initiated', 'is_awarded' => 1];
                    if(!app('JobBidRepository')->findByCriteria($criteria)){

                        $criteria = ['job_id' => $initiatedJob->id, 'is_awarded' => 1];

                        if($jobBid = app('JobBidRepository')->findByCriteria($criteria)){

                            $updateData = ['id' => $jobBid->id, 'status' => 'initiated'];
                            app('JobBidRepository')->update($updateData);

                        }else{

                            $criteria = ['job_id' => $initiatedJob->id];
                            $jobBid = app('JobBidRepository')->model->where('is_tbd', '=' , 0)
                                        ->where($criteria)->first();
                            if($jobBid){
                            $updateData = ['id' => $jobBid['id'], 'status' => 'initiated', 'is_awarded' => 1];
                            $jobBid = app('JobBidRepository')->update($updateData);
                                
                            }else{
                                app('JobRepository')->update(['id' => $criteria['job_id'], 'status' => 'in_bidding']);
                            }

                        }

                    }

                }

            }


            $criteria = ['filter_by_status' => 'awarded'];
            $awardedJobs = app("JobRepository")->findByAll(false, 10, $criteria);

            if($awardedJobs['data']){

                $data = [];
                foreach ($awardedJobs['data'] as $key => $awardedJob) {

                    $criteria = ['job_id' => $awardedJob->id, 'is_awarded' => 1];
                    if(!app('JobBidRepository')->findByCriteria($criteria)){
                        $jobBid = app('JobBidRepository')->findByAttribute('job_id', $criteria['job_id']);
                        $updateData = ['id' => $jobBid->id, 'is_awarded' => 1];
                        app('JobBidRepository')->update($updateData);

                    }

                }

            }

            $criteria = ['filter_by_status' => 'completed'];
            $completedJobs = app("JobRepository")->findByAll(false, 10, $criteria);

            if($completedJobs['data']){

                $data = [];
                foreach ($completedJobs['data'] as $key => $completedJob) {

                    $criteria = ['job_id' => $completedJob->id, 'status' => 'completed', 'is_awarded' => 1];
                    if(!app('JobBidRepository')->findByCriteria($criteria)){

                        $criteria = ['job_id' => $completedJob->id, 'is_awarded' => 1];

                        if($jobBid = app('JobBidRepository')->findByCriteria($criteria)){

                            $updateData = ['id' => $jobBid->id, 'status' => 'completed'];
                            app('JobBidRepository')->update($updateData);

                        }else{

                            $criteria = ['job_id' => $completedJob->id];
                            $jobBid = app('JobBidRepository')->model->where('is_tbd', '=' , 0)
                                        ->where($criteria)->first();
                            
                            $updateData = ['id' => $jobBid['id'], 'status' => 'completed', 'is_awarded' => 1];
                            $jobBid = app('JobBidRepository')->update($updateData);

                        }

                    }

                }

            }


            $criteria = ['filter_by_status' => 'awarded'];
            $awardedJobBids = app("JobBidRepository")->findByAll(false, 10, $criteria);

            if($awardedJobBids['data']){

                $data = [];
                foreach ($awardedJobBids['data'] as $key => $jobBid) {
                    $updateData = ['id' => $jobBid->job_id, 'status' => 'awarded'];
                    app('JobRepository')->update($updateData);
                }

            }

            $criteria = ['filter_by_status' => 'completed'];
            $completedJobBids = app("JobBidRepository")->findByAll(false, 10, $criteria);

            if($completedJobBids['data']){
                $data = [];
                foreach ($completedJobBids['data'] as $key => $jobBid) {
                    $updateData = ['id' => $jobBid->job_id, 'status' => 'completed'];
                    app('JobRepository')->update($updateData);
                }

            }

            echo "\nJob Bids added successfully.\n"; 

        }


    }   
}
