<?php

namespace App\Listeners;

use App\Events\UserLoginHistory;
use App\Models\ModelUserLoginHistory;
use Illuminate\Support\Carbon;

class StoreloginHistory
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
     * @param  \App\Events\UserLoginHistory  $event
     * @return void
     */
    public function handle( UserLoginHistory $event )
    {
        $loginTime = Carbon::now()->toDateTimeString();

        $userDetails = $event->user;
      

        $input['first_name'] = $userDetails->first_name;

        $input['email'] = $userDetails->email;

        $input['login_time'] = $loginTime;

        // dd( $userDetails , $input);
        $saveHistory = ModelUserLoginHistory::create( $input );

        return $saveHistory;

    }
}
