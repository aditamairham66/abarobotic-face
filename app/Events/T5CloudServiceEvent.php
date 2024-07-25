<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class T5CloudServiceEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
    * The name of the queue connection to use when broadcasting the event.
    *
    * @var string
    */
    public $connection = 'redis';

    /**
    * The name of the queue on which to place the broadcasting job.
    *
    * @var string
    */
    public $queue = 'T5CloudService';

    public $data;

    /**
     * Create a new event instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('T5CloudService-Channel');
    }

    /*
     * The Event's broadcast name.
     * 
     * @return string
     */
    public function broadcastAs()
    {
        return 'T5CloudService-Handle';
    }
    
    /*
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return $this->data;
    }
}
