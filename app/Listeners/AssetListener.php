<?php

namespace App\Listeners;

use App\Events\AssetEven;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AssetListener
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
     * @param  \App\Events\AssetEven  $event
     * @return void
     */
    public function handle(AssetEven $event)
    {
         info('New Asset created'.$event->asset->id);
        //
    }
}
