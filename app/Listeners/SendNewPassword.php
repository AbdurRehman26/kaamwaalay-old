<?php

namespace App\Listeners;

use App\Events\NewPasswordSet;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewPassword
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
     * @param  NewPasswordSet  $event
     * @return void
     */
    public function handle(NewPasswordSet $event)
    {
         $event->user->sendPasswordLinkByAdmin();
    }
}
