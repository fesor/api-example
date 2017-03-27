<?php

namespace Example\Posts\Action;

use Example\Posts\Model\Author;
use Example\Uploads\FileReference;
use Symfony\Component\HttpFoundation\Request;

class AddPost
{
    public $author;
    public $description;
    public $media;

    public function map(Request $request)
    {
        $user = $request->attributes->get('author');

        $this->author = new Author($user->id);
        $this->description = $request->get('description');
        $this->media = new FileReference($request->get('media'));
    }
}
