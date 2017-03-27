<?php

namespace Example\Posts\Action;

use Example\Posts\Model\Post;
use Example\Posts\Model\TagProcessor;

class AddPostAction
{
    /**
     * @var TagProcessor
     */
    private $tagProcessor;

    public function __construct(TagProcessor $tagProcessor)
    {
        $this->tagProcessor = $tagProcessor;
    }

    public function __invoke(AddPost $data)
    {
        $post = Post::builder()
            ->setAuthor($data->author)
            ->setMedia($data->media)
            ->setDescription($data->description, $this->tagProcessor)
            ->build();

        return $post;
    }
}
