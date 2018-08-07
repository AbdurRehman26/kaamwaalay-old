<?php

use Illuminate\Database\Seeder;
use App\Data\Models\User;
use App\Data\Models\Role;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $date = Carbon::now();
    
        $userData = [
            'id' => 1,
            'first_name' => 'Admin',
            'last_name' => '',
            'email' => 'admin@psm.com',
            'password' => Hash::make('cygnismedia'),
            'role_id' => Role::ADMIN,
            'country_id' => NULL,
            'state_id' => NULL,
            'city_id' => NULL,
            'status' => 'active',
            'activation_key' => Hash::make('cygnismedia'),
            'activated_at' => $date,
            'remember_token' => Hash::make('cygnismedia'),
            'created_at' => $date,
            'updated_at' => $date,
            'deleted_at' => NULL,
        ];
        
        User::insertOnDuplicateKey($userData);
    }
}
