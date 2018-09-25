<?php

namespace App\Listeners;

use App\Events\UrgentJobCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Data\Models\User;


class SendUrgentJobCreated implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UrgentJobCreated  $event
     * @return void
     */
    public function handle(UrgentJobCreated $event)
    {
        //$model = new Job();
        $event->id = $event->sendTo;
        $user = User::find($event->sendTo);
        $sendBy = User::find($event->sendById);
        $event->sendBy = $sendBy;
        $user->notify(new \App\Notifications\SendUrgentJob($event));
        //$model->notify(new \App\Notifications\SendUrgentJob($event));

    }
}
