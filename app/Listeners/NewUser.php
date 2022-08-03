<?php

namespace App\Listeners;

use App\Events\NewUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewUser
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
     * @param  \App\Events\NewUser  $event
     * @return void
     */
    public function handle(NewUser $event)
    {
        //
        info('New User created'.$event->user->id);
    }
}
