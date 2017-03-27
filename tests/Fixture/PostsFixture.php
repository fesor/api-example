<?php

namespace Tests\Fixture;

use Doctrine\Common\Persistence\ObjectManager;
use Example\Posts\Action\AddPost;
use Example\Posts\Action\AddPostAction;
use Example\Posts\Model\Author;
use Example\Uploads\FileReference;
use Ramsey\Uuid\Uuid;

class PostsFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->createAddPostRequests() as $request) {
            $this->container->get(AddPostAction::class)->__invoke($request);
        }

        $manager->flush();
    }

    private function createAddPostRequests()
    {
        $authors = array_map(function () {
            return Uuid::uuid4()->toString();
        }, range(1, 20));

        $photos = [
            'http://lorempixel.com/400/400/food/',
            'http://lorempixel.com/400/400/fashion/',
            'http://lorempixel.com/400/400/people/',
        ];

        for ($i = 0; $i < 1000; $i++) {
            $request = new AddPost();
            $request->description = $this->randomDescriptionWithHashTags();
            $request->author = new Author($authors[mt_rand(0, 19)]);
            $request->media = FileReference::url($photos[mt_rand(0, 2)]);

            yield $request;
        }
    }

    public function getOrder()
    {
        return self::AFTER_USERS;
    }

    private function randomDescriptionWithHashTags()
    {
        $description = 'Some random description ';

        $hashtags = [
            '#love',
            '#instagood',
            '#me',
            '#tbt',
            '#cute',
            '#follow',
            '#followme',
            '#photooftheday',
        ];
        $total = count($hashtags) - 1;

        if (mt_rand(0, 1)) {
            $tags = join(' ', [
                $hashtags[mt_rand(0, $total)],
                $hashtags[mt_rand(0, $total)],
            ]);
        } else {
            $tags = $hashtags[mt_rand(0, $total)];
        }

        return $description . $tags;
    }
}
