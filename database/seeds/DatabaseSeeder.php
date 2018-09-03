<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Guest User Calls

        //$this->call(CountriesTableSeeder::class);
       // $this->call(StatesTableSeeder::class);
       // $this->call(CitiesTableSeeder::class);
       // $this->call(ZipCodesTableSeeder::class);

      //  $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        
       // $this->call(SupportQuestionsTableSeeder::class);
       // $this->call(PlansTableSeeder::class);

        // Service and Service Provider 

        $this->call(ServiceTableSeeder::class);
        $this->call(ServiceProviderProfileSeeder::class);

        // Job Seeder  

      //  $this->call(PaymentTableSeeder::class);


        \Artisan::call('passport:install');
        \Artisan::call('cache:clear');
    }
}
