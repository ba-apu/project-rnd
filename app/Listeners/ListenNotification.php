<?php

namespace App\Listeners;

use App\Events\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ListenNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    private $data;
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Notification  $event
     * @return void
     */
    public function handle(Notification $event)
    {
        $this->data = $event->message;

        $notification = new \App\Notification();
        $notification->messege = $this->data['message'];

        $notification->save();
    }
}
