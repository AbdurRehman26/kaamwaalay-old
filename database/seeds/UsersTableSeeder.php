<?php

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

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

        $country_id = 237;

        $numOfStates = 2;

        $zipCodes = app('ZipCodeRepository')->model->inRandomOrder()->pluck('zip_code')->toArray();
        
        $states = app('StateRepository')->model->inRandomOrder()->limit($numOfStates)->pluck('id')->toArray();
        
        $cities = app('CityRepository')->model->whereIn('state_id' , $states)->get()->toArray();
        
        $state_id = $states[array_rand($states)];

        $city_id = !empty($cities[self::getCityId($cities , 'state_id', $state_id)]) ? $cities[self::getCityId($cities , 'state_id', $state_id)]['id'] : null;

        $data[] =[
            'id' => 1,
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'hassaan.zia@cygnismedia.com',
            'address' => $faker->Address,
            'password' => bcrypt('cygnismedia'),
            'role_id' => Role::ADMIN,
            'access_level' => 'full',
            'country_id' => $country_id,
            'phone_number' => $faker->PhoneNumber,
            'state_id' => $state_id,
            'city_id' => $city_id,
            'status' => 'active',
            'zip_code' => $zipCodes[array_rand($zipCodes)],
            'activation_key' => bcrypt('cygnismedia'),
            'activated_at' => $date,
            'remember_token' => bcrypt('cygnismedia'),
            'created_at' => $date,
            'updated_at' => $date,
            'deleted_at' => NULL,
            'profile_image' => 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/328820/profile/profile-512.jpg?1',
        ];
        $i =2;

        User::insertOnDuplicateKey($data);

        $imagesArray = [
            'https://s3-us-west-2.amazonaws.com/s.cdpn.io/328820/profile/profile-512.jpg?1',
            'https://media.licdn.com/dms/image/C4D03AQE3TqYVs-m4mQ/profile-displayphoto-shrink_200_200/0?e=1541030400&v=beta&t=c7P4XGmqCJv7z9JR5xeoU9e1qC1uT9Vo1AaFNxPo_xo',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmoNN5E0NnKTB41bzSN9J1CV0L_VqlrMHM3MFjTTkWHXbJUA42',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS7rWwNDM2hUyPZTYrIoQ4cmrgznC93r9aZFRvsoQWYcvuZy5DG',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSp9GN6TrHUv4FngRI2PBRUxYOto1qC5aHrejN96iQFBdzVP3Dh',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_waCO6QkMLzsG__DqOpWDdG7loMKZ_GzYlH7kXPWvrCosq4dk',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-NbkK5GFyUDmT4g7ZfYr6oSdRIDNeG0NA_ihu8Rkkv_l3IIvq'
        ];


        $roles = [Role::CUSTOMER,Role::SERVICE_PROVIDER,Role::REVIEWER];

        $data = [];

        foreach (range(1, 20) as $index) {

            $state_id = $states[array_rand($states)];

            $city_id = $cities[self::getCityId($cities , 'state_id', $state_id)]['id'];

            $data[] = [

                'id' => $i,
                'first_name' => $faker->firstName,
                'last_name' =>$faker->LastName,
                'email' => $faker->email,
                'address' => $faker->Address,
                'password' => bcrypt('cygnismedia'),
                'role_id' => $roles[array_rand($roles)],
                'access_level' => 'full',
                'country_id' => $country_id,
                'phone_number' => $faker->PhoneNumber,
                'state_id' => $state_id,
                'city_id' => $city_id,
                'status' => 'active',
                'zip_code' => $zipCodes[array_rand($zipCodes)],
                'activation_key' => bcrypt('cygnismedia'),
                'activated_at' => $date,
                'remember_token' => bcrypt('cygnismedia'),
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
                'profile_image' => $imagesArray[array_rand($imagesArray)],
            ];
            $i++;
        } 

        User::insertOnDuplicateKey($data, ['first_name', 'last_name', 'updated_at']);

    }

    function getCityId($products, $field, $value)
    {
       foreach($products as $key => $product)
       {
          if ( $product[$field] === $value )
             return $key;
     }
     return false;
 }

}
