<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

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


        $now = Carbon::now()->toDateTimeString();

        $services = [
            'Home Cleaning',
        ];


        $subServices = [
         'Home Cleaning' => [
             'Maid Service',
             'Cleaning Service',
             'Office Cleaning',
             'Move in Cleaning',
             'Room Cleaning',
         ],
     ];

        $isFeatured = [0, 0, 1];
        // reduce the probabiltiy of 1 occuring

        $serviceRandomImages = [
        'images/cleaning1.jpg',
        'images/cleaning2.jpg',
        'images/cleaning3.jpg',
    ];

        foreach ($services as $key => $service) {
            $imageObject = [];

            $imageObject[]['name'] = url($serviceRandomImages[array_rand($serviceRandomImages)]);

            $data [] = [
            'id' => (int) $key + 1,
            'title' => $service,
            'description' => $faker->Text,
            'url_suffix' => strtolower(str_replace(' ', '-', $service)),
            'parent_id' => null,
            'images' => json_encode($imageObject),
            'is_featured' => $isFeatured[array_rand($isFeatured)],
            'created_at' => $now,
            'updated_at' => $now,
        ];
        }
        app("ServiceRepository")->model->insertOnDuplicateKey($data);

        $key = 13;


        foreach ($subServices as $parentServiceKey => $subService) {
            $data = [];
            $parentService = app('ServiceRepository')->findByAttribute('title', $parentServiceKey);

            if (empty($parentService)) {
                continue;
            }


            foreach ($subService as $value) {
                $imageObject = [];

                $imageObject[]['name'] = url($serviceRandomImages[array_rand($serviceRandomImages)]);


                $data [] = [
                'id' => (int) $key,
                'title' => $value,
                'url_suffix' => strtolower(str_replace(' ', '-', $value)),
                'description' => $faker->Text,
                'parent_id' => $parentService->id,
                'images' => json_encode($imageObject),
                'is_featured' => $isFeatured[array_rand($isFeatured)],
                'is_display_banner' => 1,
                'is_display_service_nav' => 1,
                'is_display_footer_nav' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ];
                $key += 1;
            }
            app("ServiceRepository")->model->insertOnDuplicateKey($data);
        }
    }
}
