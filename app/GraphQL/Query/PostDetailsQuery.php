<?php

namespace Example\GraphQL\Query;

use Example\GraphQL\Resolver\PostResolver;
use Example\GraphQL\Type\PostType;
use Example\GraphQL\Type\Scalar\UuidType;
use Example\Posts\ReadModel\PostDetailsCriteria;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;
use Youshido\GraphQL\Type\Scalar\StringType;

class PostDetailsQuery extends AbstractField
{
    public function getType()
    {
        return new PostType();
    }

    public function build(FieldConfig $config)
    {
        $config
            ->setDescription('Returns details of specific post')
            ->addArgument('id', [
                'type' => new UuidType(),
            ]);
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        return $info->getContainer()->get(PostResolver::class)->resolvePostDetails($value, $args, $info);
    }
}
