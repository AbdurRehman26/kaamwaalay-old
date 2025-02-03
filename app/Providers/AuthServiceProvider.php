<?php

namespace App\Providers;
use App\Models\Role;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        if (!\App::runningInConsole()) {
            $scopes = Role::pluck('scope')->toArray();
            $data = [];
            if(!empty($scopes)){
                foreach ($scopes as $key => $value) {
                    if($value){
                        $tempArr = $value;
                        $data = array_merge($data,array_combine($tempArr, $tempArr));
                    }
                    $data = array_unique($data);
                }
            }
            Passport::tokensCan($data);
        }
    }
}
