<?php

namespace App\Listeners;

use App\Events\SendMail;
use App\Mail\NewUserRegister;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailFired
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
     * @param  \App\Events\SendMail  $event
     * @return void
     */
    public function handle(SendMail $event)
    {
        $token =  $event->credentials->token;
        $user_email = $event->credentials->user_email;

        Mail::to($user_email)->send(new NewUserRegister($token));

        // Mail::send('verification', ['token' => $token], function ($message) use ($request) {
        //     $message->to($request->email);
        //     $message->subject('Email Verification Mail');
        // });
    }
}