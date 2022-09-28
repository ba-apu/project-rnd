<?php

namespace App\Http\Controllers;

use App\Events\Notification;
use App\Http\Controllers\Api\BaseController;
use GuzzleHttp\Exception\GuzzleException;
use Pusher\Pusher;
use Pusher\PusherException;


class PusherController extends BaseController
{
    function testPusher(){
        return view('welcome');
    }

    public function test() {
        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );
        try {
            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                $options
            );

            $data['message'] = 'Hello';
            $pusher->trigger('my-channel', 'my-event', $data, ['encrypted' => true]);

            //To listener
            event(new Notification($data));
        } catch (PusherException $e) {
            //Error
        } catch (GuzzleException $e) {
            //Error
        }
    }

}
