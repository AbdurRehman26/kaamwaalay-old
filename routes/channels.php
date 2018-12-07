<?php
use App\Data\Models\JobMessage;
use App\Data\Models\JobBid;
use App\Data\Models\User;
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/


Broadcast::channel('Job-Messages.{job_bid_id}', function ($user, $job_bid_id) {
	
    $service_provider = app('JobBidRepository')->findById((int)$job_bid_id);

    $customer = app('JobRepository')->findById((int)$service_provider->job_id);
    return  (($user->role_id == 3 || $user->role_id == 2) && ((int) $user->id == $service_provider->user_id || (int) $user->id == $customer->user_id));
});
Broadcast::channel('User-Is-Online.{job_bid_id}', function ($user, $job_bid_id) {
	
    $service_provider = app('JobBidRepository')->findById((int)$job_bid_id);

    $customer = app('JobRepository')->findById((int)$service_provider->job_id);
    return  (($user->role_id == 3 || $user->role_id == 2) && ((int) $user->id == $service_provider->user_id || (int) $user->id == $customer->user_id));
});
Broadcast::channel('App.Data.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
