<?php

use Illuminate\Database\Seeder;
use App\Data\Models\Plan;
use Carbon\Carbon;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$date = Carbon::now();   
        $planRepository = app('PlanRepository');
        $i = 1;
        $data = [
            [
                'product' => 'urgent_job',
                'amount' => 2,
                'quantity' => NULL,
                'type' => 'job',
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ],
            [
                'product' => 'account_creation',
                'amount' => 2,
                'quantity' => NULL,
                'type' => 'service',
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ],
            [
                'product' => 'featured_profile',
                'amount' => 10,
                'quantity' => 100,
                'type' => 'service',
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ],
            [
                'product' => 'featured_profile',
                'amount' => 15,
                'quantity' => 200,
                'type' => 'service',
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ],
            [
                'product' => 'featured_profile',
                'amount' => 25,
                'quantity' => 500,
                'type' => 'service',
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ],
        ];
        foreach ($data as $datum) {
                    $planRepository->create($datum);
                } 

    }
}
