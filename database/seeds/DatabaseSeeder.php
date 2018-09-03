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
        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(ZipCodesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SupportQuestionsTableSeeder::class);
        $this->call(PlansTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(JobTableSeeder::class);
        $this->call(ServiceProviderProfileSeeder::class);
        $this->call(UserRatingTableSeeder::class);
        \Artisan::call('passport:install');
    }
}
