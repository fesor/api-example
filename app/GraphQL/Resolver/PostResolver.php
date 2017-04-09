<?php

namespace Example\GraphQL\Resolver;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Example\Common\Doctrine\NestedArrayHydrator;
use Example\Posts\Model\Post;

class PostResolver
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function resolveFeed()
    {
        $query = $this->em->createQueryBuilder()
            ->select('p')
            ->from(Post::class, 'p')
            ->setMaxResults(20)
            ->getQuery()
            ->setHydrationMode(NestedArrayHydrator::NESTED_ARRAY);


        return new Paginator($query);
    }

    public function resolvePostDetails(string $id)
    {
        $qb = $this->em->createQueryBuilder()
            ->select('p')
            ->from(Post::class, 'p')
            ->where('p.id = :id')
            ->setParameter('id', $id);

        $result = $qb->getQuery()->getOneOrNullResult(NestedArrayHydrator::NESTED_ARRAY);

        return $result;
    }

    public function resolvePostDetailsWithAuthor(string $id)
    {
        return $this->resolvePostDetails($id);
    }
}
