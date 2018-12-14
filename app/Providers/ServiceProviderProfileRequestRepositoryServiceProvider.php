<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\ServiceProviderProfileRequest;
use App\Data\Repositories\ServiceProviderProfileRequestRepository;
use App\Notifications\ServiceProviderReviewNotification;
use App\Data\Models\User;

class ServiceProviderProfileRequestRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        ServiceProviderProfileRequest::updated(function($item) {
            if($item->status == ServiceProviderProfileRequest::APPROVED || $item->status == ServiceProviderProfileRequest::REJECTED){  
                $event = new \StdClass();
                $event->id = $item->id;
                $event->body = $item;
                $event->from = User::find($item->approved_by);
                $event->to = User::find($item->user_id);   
                if($item->status == ServiceProviderProfileRequest::APPROVED){
                    $event->title = "Profile has been approved";
                    $event->message =  'Your Profile has been approved.'; 
                    $event->type = 'profile_approved';
                    $event->link_text =  'Bid Now'; 
                    $event->route =  'explore-jobs'; 
                }else{
                    $event->title = "Profile has been rejected";
                    $event->link_text =  'Re-submit your profile'; 
                    $event->route =  'my.bids'; 
                    $event->type = 'profile_rejected';
                    $event->message =  'Your Profile has been rejected.'; 
                }
               $event->to->notify(new ServiceProviderReviewNotification($event));
            }
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'ServiceProviderProfileRequestRepository', function () {
                return new ServiceProviderProfileRequestRepository(new ServiceProviderProfileRequest);
            }
        );
    }
}
