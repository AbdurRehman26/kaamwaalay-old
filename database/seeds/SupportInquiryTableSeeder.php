<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Data\Models\Role;
use Carbon\Carbon;

class SupportInquiryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfRandomQuestions = 20;
        
        echo "\nUsers and support questions must be preset in database to run this seeder.";

        $ids = app('SupportQuestionRepository')->model->inRandomOrder()
        ->limit($numberOfRandomQuestions)->pluck('id')->toArray();

        $userIds = app('UserRepository')->model->inRandomOrder()
        ->where('role_id' , Role::CUSTOMER)->limit($numberOfRandomQuestions)->pluck('id')->toArray();
        
        $numberOfEntries = 20;

        $date = Carbon::now();
        $faker = Faker::create();
        $formattedDate = $date->format('F Y');

        if(!empty($userIds) && !empty($ids)){

            for ($i = 1 ; $i <= $numberOfEntries ; $i++) {
                $data[] = [
                    'id' => $i,
                    'message' => $faker->Text,
                    'support_question_id' => $ids[array_rand($ids)],
                    'user_id' => $userIds[array_rand($userIds)],
                    'is_replied' => mt_rand(0,1),
                    'created_at' => $formattedDate
                ];
            }

            app('SupportInquiryRepository')->model->InsertOnDuplicateKey($data);       

        }

    }
}
