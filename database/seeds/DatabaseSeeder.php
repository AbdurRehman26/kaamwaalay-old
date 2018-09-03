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


        $this->call(PaymentTableSeeder::class);


        \Artisan::call('passport:install');
    }
}
