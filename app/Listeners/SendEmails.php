<?php

namespace App\Listeners;

use App\Events\UserRegistred;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmails
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
     * @param  UserRegistred  $event
     * @return void
     */
    public function handle(UserRegistred $event)
    {
        //
    }
}
