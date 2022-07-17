<?php

namespace App\Http\Controllers;

use Notification;
use App\Models\User;
use App\Models\Agent;
use App\Models\Withdrawl;
use Illuminate\Http\Request;
use App\Notifications\TestNotification;

class TestController extends Controller
{
    public function sendNotification()
    {
        $user = User::find(2);
        $agent = Agent::find(2);
        
        // return $user->unreadNotifications;
        $details = [
            'greeting' => 'Hi Artisan',
            'body' => 'This is my first notification from Nicesnippests.com',
            'thanks' => 'Thank you for using Nicesnippests.com tuto!',
            'actionText' => 'View My Site',
            'actionURL' => url('/'),
            'order_id' => 101
        ];
        // dd($details);
        // Notification::send($user, new TestNotification($details));
        // $user->notify(new TestNotification($details));
        $agent->notify(new TestNotification($user));
   
        dd('done');
    }

    public function withdrawal()
    {
        $data = Withdrawl::where('amount', 'LIKE', '%$%')->get();
        return $data;
    }
}
