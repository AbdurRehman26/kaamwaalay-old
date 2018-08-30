<?php

use Illuminate\Database\Seeder;
use App\Data\Models\User;
use App\Data\Models\Role;
use App\Data\Models\ServiceProviderProfile;
use App\Data\Models\ServiceProviderProfileRequest;
use App\Data\Models\ServiceProviderService;
use Carbon\Carbon;
use Faker\Factory as Faker;

class ServiceProviderProfileSeeder extends Seeder
{

    protected $signature = 'service-provider-table-seed';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        $faker = Faker::create();
        $formatteddate = $date->format('F Y');
        $users = new User();
        $getUsers = $users->where('role_id','=',Role::SERVICE_PROVIDER)->get();
        $data = [];
        $i =1;
        $business_type = ['business', 'individual'];
        foreach ($getUsers as $getUser) {
            $data[]=[
                'id' => $i,
                'user_id' => $getUser->id,
                'business_name' =>$faker->Company,
                'business_details' =>$faker->Address,
                'duns_number' =>rand(),
                'years_of_experience' =>$formatteddate,
                'is_featured' => 0,
                'is_verified' => 0,
                'created_at' => $date,
                'updated_at' => $date,
                'deleted_at' => NULL,
            ];
            $this->info('service-provider-profile'.$i);
            $i++;
        } 
        ServiceProviderProfile::insertOnDuplicateKey($data);
       
        $serviceProviderData = [];
        $serviceProviders = new ServiceProviderProfile();
        $getServiceProviders = $serviceProviders->pluck('user_id')->toArray();
        foreach ($getServiceProviders as $getServiceProvider) {
           $serviceProviderData[]=[
            'id' => $i,
            'user_id' => $getServiceProvider,
            'approved_at' => $date,
            'created_at' => $date,
            'updated_at' => $date,
            'deleted_at' => NULL,
        ];
        $this->info('service-provider-request'.$i);
        $i++;
       }
    ServiceProviderProfileRequest::insertOnDuplicateKey($serviceProviderData);
    
     $serviceProviderServiceData = [];
     $serviceProviderRequests = new ServiceProviderProfileRequest();
     $serviceProviderRequests = $serviceProviderRequests->pluck('id')->toArray();
        foreach ($serviceProviderRequests as $serviceProviderRequest) {
           $service = app('ServiceRepository')->model->inRandomOrder()->first();
           $serviceProviderServiceData[]=[
            'id' => $i,
            'service_provider_profile_request_id' => $serviceProviderRequest,
            'service_id' => $service->id,
            'created_at' => $date,
            'updated_at' => $date,
            'deleted_at' => NULL,
        ];
        $this->info('service-provider-services'.$i);
        $i++;
       }
    ServiceProviderService::insertOnDuplicateKey($serviceProviderServiceData);
}
public function info($string)
{
    \Log::info($this->signature . ' - ' . $string);
    print_r($string.PHP_EOL);
}
}
