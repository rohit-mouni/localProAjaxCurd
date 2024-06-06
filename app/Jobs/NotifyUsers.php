<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\DummyUser;

class NotifyUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $allUsers = DummyUser::whereNotNull('phone')->get();
        $msg = 'testing twilio msg  using Queue job by rohit';
        // $allUsers  = array('+916377716151');
        foreach ($allUsers as $key => $Users) {
            $UsersNo = '+91'.$Users->phone;
            $data = SendTwilioNotification($UsersNo, $msg.$key);
        }
    }
}

