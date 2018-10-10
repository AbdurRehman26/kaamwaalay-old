<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

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
            'Tv and Electronics',
            'Assembly',
            'General Handy Man',
            'Plumbing',
            'Electrical' ,
            'Painting',
            'Moving',
            'Smart Home',
            'Window Treatments',
            'Outdoor',
            'Storage'
        ];


        $subServices = [
           'Home Cleaning' => [
               'Apartment Cleaning',
               'HouseKeeping',
               'Maid Service',
               'Move Out Cleaning',
               'Vacation Rental Cleaning',
               'Cleaning Service',
               'Office Cleaning',
               'Move in Cleaning',
               'Room Cleaning'
           ],
           'Tv and Electronics' => [
               'Hiding TV Wires',
               'Home Theater AV Setup',
               'SoundBar Installation',
               'TV Mounting'
           ],
           'Assembly' => [
               'Bed Assembly',
               'Exercise Equipment Assembly',
               'Outdoor Furniture Assembly',
               'Desk Assembly',
               //'Furniture Assembly',
               'Dresser Assembly',
               'Office Furniture Assembly',
           ],
           'General Handy Man' => [
               'Air Conditioner Installation',
               'Handy Helper',
               'Interior Painting',
             //  'TV Mounting',
               'Air Conditioner Uninstall',
               'Handy Service',
               //'Knobs Installation',
               'Furniture Assembly',
               'Hanging Pictures & Shelves',
               'Locks Installation',
           ],
           'Plumbing' => [
               'Drain Repair',
               'Faucet Replacement',
               'Toilet Trouble',
               'Faucet Installation',
               'Plumbing Service',
               'Unclog Toilet',
               'Faucet Repair',
               'Toilet Repair',
           ],
           'Electrical'  => [
               'Ceiling & Bath Fans',
               //'Light Fixtures',
               'Smart Security Cam Installation',
               'Electric Service',
               'Light Switch Installation',
             //  'Smart Thermostat Installation',
               'Garbage Disposal',
               'Outlet Installation',
           ],
           'Painting' => [
               'Accent Wall Painting',
               'Crown Molding Painting',
              // 'Interior Painting',
               'BaseBoard Painting',
               'Door Painting',
               'Bed Room Painting',
               'DoorFrame Painting',
           ],
           'Moving' => [
              // 'Hanging Pictures & Shelves',
               'Light Fixtures',
               'Moving Help',
               'Window Treatments',
               //'Interior Painting',
              // 'Move in Cleaning',
               'Knobs Installation',
               //'Move Out Cleaning',
               //'TV Mounting',
           ],
           'Smart Home' => [
               'Smart Device Installation',
              // 'Smart Security Cam Installation',
               'Wi-fi Router Setup',
               'Smart Home Hub Setup',
              // 'Smart Thermostat Installation',
               'Smart Lock Installation',
               'Video Doorbell Installation',
           ],
           'Window Treatments' => [
               'Window Blind Treatment',
               'Window Shade Installation',
               'Windwo Curtain Installation',
               'Windows Treatment ',
               'Window Drapery Installation',
           ],
           'Outdoor' => [
               'Lawn Mowing and Trimming',
              //    co99 'Outdoor Furniture Assembly',
               'Yard Cleanup',
           ],
           'Storage'   => [
               'Long Term Storage',
               'Moving and Storage',
               'Short Term Storage',
           ],
       ];

       $isFeatured = [0, 0, 1];
        // reduce the probabiltiy of 1 occuring 

       $serviceRandomImages = [
        'images/dummy/door-2.jpg',
        'images/dummy/electrician.jpg',
        'images/dummy/nice-door.jpg',
        'images/dummy/jobfileimage1.png',
        'images/dummy/jobfileimage2.png',
        'images/dummy/carpenter1.jpg',
        'images/dummy/carpenter2.jpg',
        'images/dummy/carpenter3.jpg',
        'images/dummy/cleaning1.jpg',
        'images/dummy/cleaning2.jpg',
        'images/dummy/cleaning3.jpg',
        'images/dummy/concret.png',
        'images/dummy/electrician1.jpg',
        'images/dummy/electrician2.jpg',
        'images/dummy/electrician3.jpg',
        'images/dummy/mds.png',
        'images/dummy/mover1.jpg',
        'images/dummy/mover2.jpg',
        'images/dummy/mover3.jpg',
        'images/dummy/painter1.jpg',
        'images/dummy/painter2.jpg',
        'images/dummy/painter3.jpg',
    ];

    foreach ($services as $key => $service) {


        $imageObject[]['name'] = url($serviceRandomImages[array_rand($serviceRandomImages)]);


        $data [] = [
            'id' => (int) $key+1,
            'title' => $service,
            'description' => $faker->Text,
            'url_suffix' =>  strtolower(str_replace(' ', '-', $service)),
            'parent_id' => null,
            'images' => json_encode($imageObject),
            'is_featured' => $isFeatured[array_rand($isFeatured)],
            'created_at' => $now,
            'updated_at' => $now
        ];
    }
    app("ServiceRepository")->model->insertOnDuplicateKey($data);

    $key = 13;


    foreach ($subServices as $parentServiceKey => $subService) {

        $imageObject[]['name'] = url($serviceRandomImages[array_rand($serviceRandomImages)]);


        $data = [];
        $parentService = app('ServiceRepository')->findByAttribute('title' , $parentServiceKey);

        if(empty($parentService)){
            continue;
        }


        foreach ($subService as $value) {

            $data [] = [
                'id' => (int) $key,
                'title' => $value,
                'url_suffix' =>  strtolower(str_replace(' ', '-', $value)),
                'description' => $faker->Text,
                'parent_id' => $parentService->id,
                'images' => json_encode($imageObject),
                'is_featured' => $isFeatured[array_rand($isFeatured)],
                'is_display_banner' => 1,
                'is_display_service_nav' => 1,
                'is_display_footer_nav' => 1,
                'created_at' => $now,
                'updated_at' => $now
            ];
            $key += 1;
        }
        app("ServiceRepository")->model->insertOnDuplicateKey($data);
    }


}
}
