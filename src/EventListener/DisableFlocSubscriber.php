<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class DisableFlocSubscriber implements EventSubscriberInterface
{
    public function onKernelResponse(ResponseEvent $event)
    {
        $response = $event->getResponse();

        $response->headers->set('Permissions-Policy', 'interest-cohort=()');
    }

    public static function getSubscribedEvents()
    {
        return [
            ResponseEvent::class => 'onKernelResponse',
        ];
    }
}
