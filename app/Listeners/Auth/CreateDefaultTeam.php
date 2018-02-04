<?php

namespace App\Listeners\Auth;

class CreateDefaultTeam
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $event->user->team()->create([
            'name' => $event->user->name,
        ]);
    }
}
