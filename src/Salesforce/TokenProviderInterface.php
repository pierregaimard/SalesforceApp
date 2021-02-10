<?php

namespace App\Salesforce;

interface TokenProviderInterface
{
    /**
     * Should return a security token as an object who implements TokenInterface.
     *
     * @return TokenInterface
     */
    public function getAccessToken(): TokenInterface;
}
