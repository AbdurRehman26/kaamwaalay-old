<?php

use Illuminate\Database\Seeder;
use App\Data\Models\Role;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$date = Carbon::now();        
        Role::insertOnDuplicateKey(array ( 
            array (
                'id' => 1,
                'title' => 'Admin',
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ),
            array (
                'id' => 2,
                'title' => 'Service Provier',
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ),
            array (
                'id' => 3,
                'title' => 'Customer',
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ),
            array (
                'id' => 4,
                'title' => 'Reviewer',
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ),
        ));
    }
}
