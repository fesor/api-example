<?php

namespace Example\Posts\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Example\Uploads\FileReference;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity()
 * @ORM\Table(name="posts")
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\Column(type="guid")
     */
    private $id;

    /**
     * @var Author
     * @ORM\Embedded(class="Example\Posts\Model\Author")
     */
    private $author;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $description;
    /**
     * @var FileReference
     * @ORM\Embedded(class="Example\Uploads\FileReference")
     */
    private $media;

    /**
     * @var ArrayCollection|Tag[]
     * @ORM\ManyToMany(targetEntity="Tag")
     */
    private $tags;

    public static function builder(): PostBuilder
    {
        return new PostBuilder();
    }

    public function __construct(PostBuilder $builder)
    {
        $this->id = Uuid::uuid4();
        $this->description = $builder->description();
        $this->tags = new ArrayCollection($builder->tags());
        $this->media = $builder->media();
        $this->author = $builder->author();
    }
}
