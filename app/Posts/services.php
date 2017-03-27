<?php

use function Fluent\{autowire, alias, factory, create};

return [
    // Actions
    \Example\Posts\Action\AddPostAction::class => autowire(),

    // Services
    \Example\Posts\Model\TagProcessor::class => alias(\Example\Posts\Service\TextTagsExtractor::class),
    \Example\Posts\Service\TextTagsExtractor::class => autowire(),
];
