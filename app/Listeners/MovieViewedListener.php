<?php

namespace App\Listeners;

use App\Events\MovieViewedEvent;
use DB;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MovieViewedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MovieViewedEvent $event): void
    {
        DB::table('movie_user_views')->insertOrIgnore([
            'movie_id' => $event->movieID,
            'user_id' => $event->userID 
        ]);
    }
}
