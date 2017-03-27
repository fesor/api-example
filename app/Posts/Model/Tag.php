<?php

namespace Example\Posts\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(readOnly=true)
 * @ORM\Table(name="tags")
 */
class Tag
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $tag;

    public function __construct(string $tag)
    {
        $this->tag = $tag;
    }

    public function __toString()
    {
        return $this->tag;
    }
}
