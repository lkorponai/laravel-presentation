<?php

namespace App\Listeners;

use App\Events\PostAction;
use App\Services\InMemoryLogger;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogPostAction
{
    /** @var InMemoryLogger */
    private $logger;

    public function __construct(InMemoryLogger $logger)
    {
        $this->logger = $logger;
    }

    public function handle(PostAction $event)
    {
        //here we can log something
        $this->logger->log('LogPostAction has been called');
    }
}
