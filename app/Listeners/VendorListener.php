<?php

namespace App\Listeners;

use App\Events\VendorEvendor;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class VendorListener
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
     * @param  \App\Events\VendorEvendor  $event
     * @return void
     */
    public function handle(VendorEvendor $event)
    {
        //
         Log::info('New vendor created'.$event->vendor->id);
    }
}
