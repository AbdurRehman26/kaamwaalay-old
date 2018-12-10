<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\UserMessagedNotification;
use App\Data\Models\User;

class UserMessagedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if(!empty($event->discussion->user)){     
            $event->to = User::find($event->discussion->reciever_id);
            $event->to->notify(new UserMessagedNotification($event));
        }
    }
}
