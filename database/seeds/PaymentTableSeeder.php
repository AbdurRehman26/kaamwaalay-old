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
        $date = Carbon::now();
        $faker = Faker::create();
        $plans = new Plan();
        $getPlans = $plans->get();
        $data = [];
        $i =1;
        foreach ($getPlans as $getPlan) {
            $service = app('ServiceRepository')->model->inRandomOrder()->first();
            $job = app('JobRepository')->model->inRandomOrder()->first();
            $data[]=[
                'id' => $i,
                'amount' => $getPlan->amount,
                'pay_by' =>$getPlan->id,
                'service_id' =>$service->id,
                'job_id' =>$job->id,
                'plan_id' =>$getPlan->id,
                'type' => $getPlan->type,
                'transaction_id' => rand(),
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ];
            $i++;
        } 
        Payment::insertOnDuplicateKey($data);
    }
}
