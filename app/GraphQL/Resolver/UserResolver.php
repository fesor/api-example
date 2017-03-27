<?php

namespace Example\GraphQL\Resolver;

class UserResolver
{
    public function getUserDetails(string $id)
    {
        return [
            'id' => $id,
            'name' => 'John Doe',
        ];
    }
}
