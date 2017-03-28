<?php

namespace Example\GraphQL\Resolver;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query;
use Example\Posts\Model\Post;
use Ramsey\Uuid\Uuid;
use Youshido\GraphQL\Execution\ResolveInfo;

class PostResolver
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function resolveFeed()
    {
        $qb = $this->em->createQueryBuilder()
            ->select('p')
            ->from(Post::class, 'p')
            ->setMaxResults(20);

        return $qb->getQuery()->getResult('NestedArrayHydrator');
    }

    public function resolvePostDetails($value, array $args, ResolveInfo $info)
    {
        $qb = $this->em->createQueryBuilder()
            ->select('p')
            ->from(Post::class, 'p')
            ->where('p.id = :id')
            ->setParameter('id', $args['id']);

        if ($info->getFieldAST('author')) {
            // todo: add join
        }

        $result = $qb->getQuery()->getOneOrNullResult('NestedArrayHydrator');

        return $result;
    }
}
