<?php

namespace Tests\Posts\Service;

use PHPUnit\Framework\TestCase;
use Example\Posts\Model\Tag;
use Example\Posts\Service\TextTagsExtractor;

class TextTagsExtractorTest extends TestCase
{
    /**
     * @dataProvider taggedTextProvider
     */
    public function testTagsProcessorShouldExtractTagsFromPostDescription(string $text, array $expectedTags)
    {
        $tagExtractor = new TextTagsExtractor();
        $tags = $tagExtractor->fromText($text);

        self::assertEquals($expectedTags, $tags);
    }

    public function taggedTextProvider()
    {
        return [
            ['some text with #hashtag', [new Tag('hashtag')]],
            ['some text without hashtags', []],
            ['#multiple#hash#tags', [new Tag('multiple'), new Tag('hash'), new Tag('tags')]],
            ['#911 numeric hash tag', [new Tag('911')]],
            ['#unique #tag #unique', [new Tag('unique'), new Tag('tag')]],
        ];
    }
}
