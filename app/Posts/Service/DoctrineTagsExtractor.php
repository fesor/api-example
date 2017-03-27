<?php

namespace Example\Posts\Service;

use Example\Posts\Model\Tag;
use Example\Posts\Model\TagProcessor;

class DoctrineTagsExtractor implements TagProcessor
{
    /**
     * @var TagProcessor
     */
    private $next;

    public function __construct(TagProcessor $next)
    {
        $this->next = $next;
    }

    /**
     * @param string $text
     * @return Tag[]
     */
    public function fromText(string $text): array
    {
        $tags = $this->next->fromText($text);

        return $tags;
    }
}
