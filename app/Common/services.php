<?php

use function Fluent\{autowire};

return [
    \Example\Common\Doctrine\MigrationEventSubscriber::class => autowire()
        ->tag('doctrine.event_subscriber', ['connection' => 'default'])
];
