<?php

namespace App\Listeners;

use App\Events\QuoteCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateLogEntry
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
     * @param  QuoteCreated  $event
     * @return void
     */
    public function handle(QuoteCreated $event)
    {
        //
    }
}
