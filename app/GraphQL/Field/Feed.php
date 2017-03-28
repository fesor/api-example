<?php

namespace Example\GraphQL\Field;

use Example\GraphQL\Resolver\PostResolver;
use Example\GraphQL\Type\PostType;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;
use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class Feed extends AbstractField
{
    public function getType()
    {
        return new ListType(
            new PostType()
        );
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        return $info->getContainer()->get(PostResolver::class)->resolveFeed();
    }
}
