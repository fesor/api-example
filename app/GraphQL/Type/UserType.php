<?php

namespace Example\GraphQL\Type;

use Example\GraphQL\Type\Scalar\UuidType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;

class UserType extends AbstractObjectType
{
    public function build($config)
    {
        $config
            ->addFields([
                'id' => new UuidType(),
                'name' => new StringType(),
            ])
            ->setDescription('Application User');
    }
}
