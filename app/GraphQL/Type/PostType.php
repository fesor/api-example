<?php

namespace Example\GraphQL\Type;

use Example\GraphQL\Query\AuthorQuery;
use Example\GraphQL\Type\Scalar\UuidType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class PostType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields([
            'id'      => new UuidType(),
            'likes' => new IntType(),
            'description' => new StringType(),
            'author' => new AuthorQuery(),
            'location' => new LocationType(),
        ]);
    }
}
