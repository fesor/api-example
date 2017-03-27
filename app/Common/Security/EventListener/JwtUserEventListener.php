<?php

namespace Example\Common\Security\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class JwtUserEventListener
{
    public function onRequest(GetResponseEvent $event)
    {
        if (!$event->isMasterRequest()) return;

        $request = $event->getRequest();

        if (!$request->headers->has('X-Authorization')) return;

        $payload = $this->extractPayloadFromToken($request->headers->get('X-Authorization'));
    }

    private function extractPayloadFromToken($jwt)
    {
        return [
            'id' => '77b80b8a-63ad-4abf-8bac-c34cbfc12558',
            'scopes' => ['posts', 'comments'],
        ];
    }
}
