<?php

namespace Example\Posts\Service;

use Example\Posts\Model\Tag;
use Example\Posts\Model\TagProcessor;

class TextTagsExtractor implements TagProcessor
{
    /**
     * @inheritdoc
     */
    public function fromText(string $text): array
    {
        preg_match_all('/\#(\w+)/', $text, $matches);

        $tags = array_map(function (string $tag) {
            return new Tag($tag);
        }, $matches[1]);

        return array_unique($tags);
    }
}
