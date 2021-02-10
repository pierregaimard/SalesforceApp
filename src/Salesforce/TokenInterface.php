<?php

namespace App\Salesforce;

interface TokenInterface
{
    /**
     * Should return the API access token as a string.
     *
     * @return string
     */
    public function getToken(): string;

    /**
     * Should return true if the access token has expired.
     *
     * @param int $maxLifetime In seconds
     *
     * @return bool
     */
    public function hasExpired(int $maxLifetime): bool;
}
