<?php

namespace Example\GraphQL;

use Example\GraphQL\Query\PostDetailsQuery;
use Youshido\GraphQL\Schema\AbstractSchema;
use Youshido\GraphQL\Config\Schema\SchemaConfig;

class Schema extends AbstractSchema
{
    public function build(SchemaConfig $config)
    {
        $this->addQueryField(new PostDetailsQuery());

        $config->getQuery()->addFields([
            new PostDetailsQuery(),
        ]);
    }
}

