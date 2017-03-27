<?php

namespace Tests\Fixture;

use Doctrine\Common\Persistence\ObjectManager;
use Example\Posts\Model\Tag;

class TagsFixture extends Fixture
{
    const HASHTAGS = [
        '#love',
        '#instagood',
        '#me',
        '#tbt',
        '#cute',
        '#follow',
        '#followme',
        '#photooftheday',
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::HASHTAGS as $hashtag) {
            $tag = new Tag(trim($hashtag, '#'));
            $manager->persist($tag);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return self::BEFORE_ANYTHING;
    }
}
