<?php

use Illuminate\Database\Seeder;
use App\Data\Models\Plan;
use App\Data\Models\Payment;
use Carbon\Carbon;
use Faker\Factory as Faker;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        echo "\nThis Seeder requires Jobs to be present in data base.\n"; 

        $date = Carbon::now();
        $faker = Faker::create();
        $plans = new Plan();
        $getPlans = $plans->get();
        $data = [];
        $i =1;

        $totalServices = 20;
        $totalJobs = 20;

        $serviceIds = app('ServiceRepository')->model->inRandomOrder()->limit($totalServices)->pluck('id')->toArray();
        
        $jobIds = app('JobRepository')->model->inRandomOrder()->limit($totalJobs)->pluck('id')->toArray();
        
        if(!empty($jobIds)){

            foreach ($getPlans as $getPlan) {
                $data[]=[
                    'id' => $i,
                    'amount' => $getPlan->amount,
                    'pay_by' =>$getPlan->id,
                    'service_id' => $serviceIds[array_rand($serviceIds)],
                    'job_id' => $jobIds[array_rand($jobIds)],
                    'plan_id' =>$getPlan->id,
                    'type' => $getPlan->type,
                    'transaction_id' => rand(),
                    'created_at' => $date,
                    'updated_at' => $date,
                    'deleted_at' => NULL,
                ];
                $i++;
            } 

            echo "\nPayments added successfully.\n"; 

        }

        Payment::insertOnDuplicateKey($data);
    }
}
