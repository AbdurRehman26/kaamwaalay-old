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
                'can_register' => 0,
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ),
            array (
                'id' => 2,
                'title' => 'Service Provier',
                'can_register' => 1,
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ),
            array (
                'id' => 3,
                'title' => 'Customer',
                'can_register' => 1,
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ),
            array (
                'id' => 4,
                'title' => 'Reviewer',
                'can_register' => 0,
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ),
        ));
    }
}
