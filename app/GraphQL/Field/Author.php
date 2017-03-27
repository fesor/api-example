<?php

namespace Example\GraphQL\Field;

use Example\GraphQL\Resolver\UserResolver;
use Example\GraphQL\Type\UserType;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;

class Author extends AbstractField
{
    public function getName()
    {
        return 'author';
    }

    public function getType()
    {
        return new UserType();
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        return $info->getContainer()->get(UserResolver::class)->getUserDetails($value['author']['userId']);
    }
}
