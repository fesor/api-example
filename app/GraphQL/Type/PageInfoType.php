<?php

namespace Example\GraphQL\Type;

use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class PageInfoType extends AbstractObjectType
{
    public function build($config)
    {
        $this->addFields([
            'total' => new IntType(),
            'after' => new StringType(),
            'first' => new IntType(),
        ]);
    }
}
