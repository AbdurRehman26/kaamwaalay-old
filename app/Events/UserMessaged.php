<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserMessaged implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $discussion;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($discussion)
    {
        $this->discussion = $discussion;
        //$this->dontBroadcastToCurrentUser();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //return new Channel('hello');
        return new PrivateChannel('Job-Messages.'.$this->discussion->job_id.$this->discussion->job_bid_id);
        //return new PrivateChannel('Job-Messages.1');
    }
}
