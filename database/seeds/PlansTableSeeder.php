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
        Plan::insertOnDuplicateKey(array (
            array (
                'id' => 1,
                'name' => 'Urgent',
                'amount' => 2,
                'quantity' => NULL,
                'type' => 'job',
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ),
            array (
                'id' => 2,
                'name' => 'Featured Profile',
                'amount' => 10,
                'quantity' => 100,
                'type' => 'service',
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ),
            array (
                'id' => 3,
                'name' => 'Featured Profile',
                'amount' => 15,
                'quantity' => 200,
                'type' => 'service',
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ),
            array (
                'id' => 4,
                'name' => 'Featured Profile',
                'amount' => 25,
                'quantity' => 500,
                'type' => 'service',
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ),
        ));
    }
}
