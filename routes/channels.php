<?php
use App\Data\Models\JobMessage;
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

Broadcast::channel('Job-Messages.{job_id}.{job_bid_id}', function ($user, $job_id, $job_bid_id) {
	$user_id = User::where('id', '=', (int) $user->id)->where(function($query) {
        $query->where('role_id', '=', 2);
        $query->orWhere('role_id', '=', 3);
    })->orderBy('id')->pluck('id')->toArray();
    if(!$user_id) {
        return false;
    }
    $criteria = ['job_id' => (int)$job_id, 'job_bid_id' => (int)$job_bid_id];
    $receiver = JobMessage::where('job_id', '=', (int)$job_id)
    ->where('job_bid_id', '=', (int)$job_bid_id)
    ->distinct('reciever_id')
    ->pluck('reciever_id')
    ->toArray();
    return $user_id[0] == $receiver[0];
});

// Broadcast::channel('Job-Messages.{id}', function ($user, $id) {
// 	dd($user);
// 	return $id == 1;
// });
