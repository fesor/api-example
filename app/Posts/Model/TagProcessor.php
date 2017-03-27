<?php

namespace Example\Posts\Model;

interface TagProcessor
{
    /**
     * @param string $text
     * @return Tag[]
     */
    public function fromText(string $text): array;
}
