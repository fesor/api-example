<?php

namespace Example\Common\Security\Token;

use Symfony\Component\Security\Core\Authentication\Token\AbstractToken;

class JwtUserToken extends AbstractToken
{
    private $jwtToken;
    private $payload;

    /**
     * Returns the user credentials.
     *
     * @return mixed The user credentials
     */
    public function getCredentials()
    {
        return $this->jwtToken;
    }
}
