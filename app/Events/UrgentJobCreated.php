<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class UrgentJobCreated implements ShouldBroadcast
{
     use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;
    public $sendTo;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data,$sendTo)
    {
        $this->data = $data->response->data->user->first_name.' '.$data->response->data->user->last_name.' has invited you to bid on their job';
        $this->sendTo = $sendTo;
       // dd($this->sendTo);
        //$this->dontBroadcastToCurrentUser();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('urgent-job-user.'.$this->sendTo);
      
    }
}
