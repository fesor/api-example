<?php

use function Fluent\{autowire};

return [
    \Example\GraphQL\Resolver\PostResolver::class => autowire(),
    \Example\GraphQL\Resolver\UserResolver::class => autowire(),
];
