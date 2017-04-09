<?php

namespace Example\GraphQL\Field;

use Example\GraphQL\Resolver\PostResolver;
use Example\GraphQL\Type\PaginatedList;
use Example\GraphQL\Type\PostType;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;

class Feed extends AbstractField
{
    public function getType()
    {
        return new PaginatedList(new PostType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $feed = $info->getContainer()->get(PostResolver::class)->resolveFeed();

        return [
            'items' => $feed,
            'pageInfo' => [
                'total' => $feed->count(),
            ]
        ];
    }
}
