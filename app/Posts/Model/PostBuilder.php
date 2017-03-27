<?php

namespace Example\Posts\Model;

use Example\Uploads\FileReference;

class PostBuilder
{
    /**
     * @var string
     */
    private $description;

    /**
     * @var FileReference
     */
    private $media;

    /**
     * @var Author
     */
    private $author;

    /**
     * @var Tag[]
     */
    private $tags;

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description, TagProcessor $tagProcessor)
    {
        $this->description = $description;
        $this->tags = $tagProcessor->fromText($description);
        return $this;
    }

    /**
     * @param FileReference $media
     * @return $this
     */
    public function setMedia(FileReference $media)
    {
        $this->media = $media;
        return $this;
    }

    /**
     * @param Author $author
     * @return $this
     */
    public function setAuthor(Author $author)
    {
        $this->author = $author;
        return $this;
    }

    public function build(): Post
    {
        return new Post($this);
    }

    public function description(): string
    {
        return $this->description;
    }

    public function media(): FileReference
    {
        return $this->media;
    }

    public function author(): Author
    {
        return $this->author;
    }

    public function tags(): array
    {
        return $this->tags;
    }
}
