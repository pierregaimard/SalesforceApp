<?php

namespace App\Salesforce;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface ApiRequestManagerInterface
{
    /**
     * should return a Symfony http-client request response (ResponseInterface)
     *
     * @param ApiRequestInterface $request
     *
     * @return ResponseInterface
     */
    public function request(ApiRequestInterface $request): ResponseInterface;
}
