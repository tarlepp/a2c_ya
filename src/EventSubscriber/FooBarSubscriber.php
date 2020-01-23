<?php

namespace App\EventSubscriber;

use App\Events\FooBarEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class FooBarSubscriber implements EventSubscriberInterface
{
    public function onFoobarEvent(FooBarEvent $event): void
    {
        dump('This in `FooBarSubscriber`', $event->getFooBarDto());
    }

    public static function getSubscribedEvents(): array
    {
        return [
            FooBarEvent::class => 'onFoobarEvent',
        ];
    }
}
