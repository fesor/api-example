<?php

namespace Example\GraphQL\Type;

use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\FloatType;

class LocationType extends AbstractObjectType
{
    public function build($config)
    {
        $config
            ->addFields([
                'latitude' => new FloatType(),
                'longitude' => new FloatType(),
            ])
            ->setDescription('Location object representation');
    }
}
