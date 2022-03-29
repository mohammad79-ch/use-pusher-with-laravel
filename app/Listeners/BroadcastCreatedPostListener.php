<?php

namespace App\Listeners;

use App\Events\ceratedPostEvent;
use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BroadcastCreatedPostListener
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
        $posts = Post::latest()->paginate(20);
        broadcast(new ceratedPostEvent($posts));
    }
}
