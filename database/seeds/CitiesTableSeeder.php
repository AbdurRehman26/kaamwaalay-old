<?php

use App\Data\Models\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::insertOnDuplicateKey([
            [
                'id' => 1,
                'name' => 'Karachi',
            ],
        ]);
    }
}
