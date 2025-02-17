<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;

class SendActivationEmail
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
     * @param  Registered  $event
     * @return void
     */
    public function handle($event)
    {
        $event->user->sendActivationEmail();
    }
}
