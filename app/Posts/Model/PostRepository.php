<?php

namespace Example\Posts\Model;

use Doctrine\ORM\EntityManagerInterface;

class PostRepository
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function add(Post $post)
    {
        $this->em->persist($post);
    }
}
