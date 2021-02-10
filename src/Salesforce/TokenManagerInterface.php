<?php

namespace App\Salesforce;

interface TokenManagerInterface
{
    /**
     * Should always return a valid fresh access token
     *
     * @return mixed
     */
    public function getToken(): string;
}
