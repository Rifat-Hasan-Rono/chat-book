<?php

namespace App\Listeners;

use App\Events\SeenEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SeenListener
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
     * @param  SeenEvent  $event
     * @return void
     */
    public function handle(SeenEvent $event)
    {
        //
    }
}
