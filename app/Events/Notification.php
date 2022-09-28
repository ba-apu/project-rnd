<?php

namespace App\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Notification implements ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

//    public $username;
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data)
    {
//        $this->username = $username;
        $this->message  = $data;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return PrivateChannel
     */
    public function broadcastOn()
    {
        $channel = new PrivateChannel('my-channel');
        return $channel;
//        return ['my-channel'];
    }

    public function broadcastAs() {
        return 'my-event';
    }
}