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
        // clears cache
        \Artisan::call('cache:clear');
        // Guest User Calls

        // commenting all seeders 

        /**/
        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(ZipCodesTableSeeder::class);
        /**/

        $this->call(RolesTableSeeder::class);
        /**/
        $this->call(UsersTableSeeder::class);
        
        $this->call(SupportQuestionsTableSeeder::class);

        // Service and Service Provider 

        $this->call(ServiceTableSeeder::class);
        $this->call(ServiceProviderProfileSeeder::class);

        // Job bid and rating commented
        
        $this->call(JobTableSeeder::class);
        $this->call(JobBidTableSeeder::class);

        // These seeders will be commented
        /** /
        $this->call(UserRatingTableSeeder::class);
        /**/

        $this->call(SupportInquiryTableSeeder::class);


        /*\Artisan::call('passport:install');
        \Artisan::call('cache:clear');
        /**/
    }
}
