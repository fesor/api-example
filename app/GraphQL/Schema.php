<?php

namespace Example\GraphQL;

use Example\GraphQL\Field\Feed;
use Example\GraphQL\Field\Post;
use Youshido\GraphQL\Schema\AbstractSchema;
use Youshido\GraphQL\Config\Schema\SchemaConfig;

class Schema extends AbstractSchema
{
    public function build(SchemaConfig $config)
    {
        $this->addQueryField(new Post());

        $config->getQuery()->addFields([
            new Post(),
            new Feed(),
        ]);
    }
}

