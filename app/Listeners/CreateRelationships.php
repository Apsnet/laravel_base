<?php

namespace App\Listeners;

use App\Events\UserRegistred;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use \App\Service;

class CreateRelationships
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
        foreach (Service::all() as $service) $event->user->services()->attach($service);
    }
}
