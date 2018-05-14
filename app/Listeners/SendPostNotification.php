<?php

namespace App\Listeners;

use App\Events\PostAction;
use App\Services\InMemoryLogger;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPostNotification
{
    /** @var InMemoryLogger */
    private $logger;

    public function __construct(InMemoryLogger $logger)
    {
        $this->logger = $logger;
    }

    public function handle(PostAction $event)
    {
        //here we can send a notification (eg an email) about the event
        $this->logger->log('SendPostNotification has been called');
    }
}
