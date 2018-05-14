<?php

namespace App\Http\Controllers;


use App\Events\PostAction;
use App\Models\Post;
use App\Services\InMemoryLogger;

class EventController extends Controller
{

    public function dispatchEvent()
    {
        $post = new Post();
        $event = new PostAction($post);

        event($event);

        $logger = resolve(InMemoryLogger::class);

        return $logger->getLogs();
    }

}