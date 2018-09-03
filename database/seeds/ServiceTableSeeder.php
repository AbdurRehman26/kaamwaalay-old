<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();
        
        $data = [];

        $services = [
            'HANDYMAN',
            'VACATION AND EXTENDED TRAVEL',
            'APPLIANCES',
            'CABINETRY',
            'CARPET',
            'CHIMNEY',
            'DRIVEWAYS',
            'DUCT CLEANING',
            'ELECTRICAL',
            'FURNITURE',
            'GLASS AND SCREENS',
            'GUTTERS',
            'HVAC',
            'HARDWOOD FLOORING',
            'LIGHTING',
            'MASONRY',
            'PAINTING',
            'PEST CONTROL',
            'PLUMBING',
            'POOLS',
            'REFUSE REMOVAL',
            'SURFACES',
            'WINDOWS AND DOORS',
            ];

            foreach ($services as $key => $service) {
                $data [] = [
                    'title' => $service,
                    'description' => $faker->Text,
                    'is_display_banner' => 1,
                    'is_display_service_nav' => 1,
                    'is_display_footer_nav' => 1,
                    'is_featured' => 1,
                ];
            }

            app("ServiceRepository")->model->insert($data);

        }
    }
