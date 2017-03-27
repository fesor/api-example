<?php

namespace Example\GraphQL\Type\Scalar;

use PascalDeVink\ShortUuid\ShortUuid;
use Ramsey\Uuid\Uuid;
use Youshido\GraphQL\Type\Scalar\StringType;

class UuidType extends StringType
{
    public function getName()
    {
        return 'uuid';
    }

    public function serialize($value)
    {
        $uuid = Uuid::fromString($value);

        return (new ShortUuid())->encode($uuid);
    }

    public function parseValue($value)
    {
        return (new ShortUuid)->decode($value);
    }

    public function getDescription()
    {
        return 'base57 URI-safe representation of Uuidv4';
    }
}
