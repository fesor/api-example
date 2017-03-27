<?php

namespace Example\Posts\Action;

use Example\Posts\Model\Post;
use Example\Posts\Model\PostRepository;
use Example\Posts\Model\TagProcessor;

class AddPostAction
{
    /**
     * @var TagProcessor
     */
    private $tagProcessor;
    /**
     * @var PostRepository
     */
    private $posts;

    public function __construct(TagProcessor $tagProcessor, PostRepository $posts)
    {
        $this->tagProcessor = $tagProcessor;
        $this->posts = $posts;
    }

    public function __invoke(AddPost $data)
    {
        $post = Post::builder()
            ->setAuthor($data->author)
            ->setMedia($data->media)
            ->setDescription($data->description, $this->tagProcessor)
            ->build();

        $this->posts->add($post);

        return $post;
    }
}
