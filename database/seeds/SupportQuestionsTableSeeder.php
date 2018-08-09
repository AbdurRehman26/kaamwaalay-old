<?php

use Illuminate\Database\Seeder;
use App\Data\Models\Role;
use App\Data\Models\SupportQuestion;
use Carbon\Carbon;

class SupportQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$date = Carbon::now();        
        SupportQuestion::insertOnDuplicateKey(array (
        	//SERVICE_PROVIDER
            array (
                'id' => 1,
                'role_id' => Role::SERVICE_PROVIDER,
                'question' => 'Question Service Provider',
                'created_at' => $date,
                'updated_at' => $date,
            ),
            array (
                'id' => 2,
                'role_id' => Role::SERVICE_PROVIDER,
                'question' => 'Question Service Provider',
                'created_at' => $date,
                'updated_at' => $date,
            ),
            array (
                'id' => 3,
                'role_id' => Role::SERVICE_PROVIDER,
                'question' => 'Question Service Provider',
                'created_at' => $date,
                'updated_at' => $date,
            ),
            //CUSTOMER
            array (
                'id' => 4,
                'role_id' => Role::CUSTOMER,
                'question' => 'Question Customer',
                'created_at' => $date,
                'updated_at' => $date,
            ),
            array (
                'id' => 5,
                'role_id' => Role::CUSTOMER,
                'question' => 'Question Customer',
                'created_at' => $date,
                'updated_at' => $date,
            ),
            array (
                'id' => 6,
                'role_id' => Role::CUSTOMER,
                'question' => 'Question Customer',
                'created_at' => $date,
                'updated_at' => $date,
            ),
        ));
    }
}
