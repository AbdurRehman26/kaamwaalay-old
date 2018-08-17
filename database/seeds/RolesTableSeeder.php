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
            0 => 
            array (
                'id' => 1,
                'title' => 'Admin',
                'scope' => 'user.index,service.index',
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Service Provier',
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Customer',
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ),
        ));
    }
}
