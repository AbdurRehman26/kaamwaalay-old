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
        $this->call(CitiesTableSeeder::class);
        $this->call(CityAreaTableSeeder::class);
        // $this->call(CityAreaTableSeeder::class);

        // $this->call(CityAreaTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        /**/
        $this->call(UsersTableSeeder::class);

        // Service and Service Provider

        $this->call(ServiceTableSeeder::class);
        $this->call(ServiceProviderProfileSeeder::class);

        // Job bid and rating commented

        $this->call(JobTableSeeder::class);
        $this->call(JobBidTableSeeder::class);

        \Artisan::call('passport:install');
        \Artisan::call('cache:clear');
        /**/
    }
}
