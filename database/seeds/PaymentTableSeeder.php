<?php

use Illuminate\Database\Seeder;
use App\Data\Models\Plan;
use App\Data\Models\Payment;
use Carbon\Carbon;
use Faker\Factory as Faker;
use App\Data\Models\Role;

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
        $data = [];
        $i =1;

        $totalServices = 20;
        $totalJobs = 20;

        $serviceIds = app('ServiceRepository')->model->inRandomOrder()->limit($totalServices)->pluck('id')->toArray();
        $planIds = app('PlanRepository')->model->inRandomOrder()->limit(10)->pluck('id')->toArray();
        
        $jobIds = app('JobRepository')->model->inRandomOrder()->limit($totalJobs)->pluck('id')->toArray();
        $customerIds = app('UserRepository')->model->inRandomOrder()->where('role_id','=',Role::CUSTOMER)->limit(10)->pluck('id')->toArray();
        $serviceProviderIds = app('UserRepository')->model->inRandomOrder()->where('role_id','=',Role::SERVICE_PROVIDER)->limit(10)->pluck('id')->toArray();

        if(!empty($jobIds)){

            foreach (range(1,150) as $index) {
                $planId = $planIds[array_rand($planIds)];
                $plan = $plans->where('id','=',$planId)->first();
                $data[]=[
                    'id' => $i,
                    'amount' => $plan['amount'],
                    'pay_by' =>($plan['type'] == 'service')? $serviceProviderIds[array_rand($serviceProviderIds)] :$customerIds[array_rand($customerIds)],
                    'service_id' => $serviceIds[array_rand($serviceIds)],
                    'job_id' => $jobIds[array_rand($jobIds)],
                    'plan_id' =>$planIds[array_rand($planIds)],
                    'type' => ($plan['type'] == 'service')?'Featured':'Urgent',
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
