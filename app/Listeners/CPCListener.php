<?php

namespace App\Listeners;

use App\Events\CPC;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CPCListener
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
     * @param  CPC  $event
     * @return void
     */
    public function handle(CPC $event)
    {
        //
    }
}
