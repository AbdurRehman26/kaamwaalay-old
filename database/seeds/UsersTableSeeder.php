<?php

use Illuminate\Database\Seeder;
use App\Data\Models\User;
use App\Data\Models\Role;
use Carbon\Carbon;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    
    protected $signature = 'user-table-seed';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $date = Carbon::now();
        $data = [];
        $data[] =[
            'id' => 1,
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'hassaan.zia@cygnismedia.com',
            'zip_code' => $faker->postcode,
            'password' => bcrypt('cygnismedia'),
            'role_id' => Role::ADMIN,
            'access_level' => 'full',
            'country_id' => NULL,
            'state_id' => NULL,
            'city_id' => NULL,
            'status' => 'active',
            'activation_key' => bcrypt('cygnismedia'),
            'activated_at' => $date,
            'remember_token' => bcrypt('cygnismedia'),
            'created_at' => $date,
            'updated_at' => $date,
            'deleted_at' => NULL,
        ];
        $i =2;
        $roles = [Role::CUSTOMER,Role::SERVICE_PROVIDER,Role::REVIEWER];

        foreach (range(1,50) as $index) {
            $data[]=[
                'id' => $i,
                'first_name' => $faker->firstName,
                'last_name' =>$faker->LastName,
                'email' => $faker->email,
                'zip_code' => $faker->postcode,
                'password' => bcrypt('cygnismedia'),
                'role_id' => $roles[array_rand($roles)],
                'access_level' => 'full',
                'country_id' => NULL,
                'state_id' => NULL,
                'city_id' => NULL,
                'status' => 'active',
                'activation_key' => bcrypt('cygnismedia'),
                'activated_at' => $date,
                'remember_token' => bcrypt('cygnismedia'),
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ];
            $this->info('user'.$i);
            $i++;
        } 
        User::insertOnDuplicateKey($data);

    }
    public function info($string)
    {
        \Log::info($this->signature . ' - ' . $string);
        print_r($string.PHP_EOL);
    }
}
