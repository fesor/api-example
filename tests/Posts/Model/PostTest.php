<?php

namespace Tests\Posts\Model;

use Example\Posts\Model\Author;
use Example\Posts\Model\Post;
use Example\Posts\Model\PostBuilder;
use Example\Posts\Model\TagProcessor;
use Example\Uploads\FileReference;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

class PostTest extends TestCase
{
    /**
     * @dataProvider invalidDataProvider
     */
    public function testPostShouldBeAlwaysValidDuringInstantiation(PostBuilder $builder)
    {
        $this->expectException(\TypeError::class);
        $post = $builder->build();
    }

    public function invalidDataProvider()
    {
        $tagProcessor = $this->prophesize(TagProcessor::class);
        $tagProcessor->fromText(Argument::any())->willReturn([]);

        return [
            [
                Post::builder()
                    ->setMedia(new FileReference())
                    ->setDescription('some description', $tagProcessor->reveal())
            ],
            [
                Post::builder()
                    ->setAuthor(new Author())
                    ->setDescription('some description', $tagProcessor->reveal())
            ],
            [
                Post::builder()
                    ->setAuthor(new Author())
                    ->setMedia(new FileReference())
            ],
        ];
    }
}
