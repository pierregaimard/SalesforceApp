<?php

namespace App\Salesforce;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class ApiRequestManager implements ApiRequestManagerInterface
{
    /**
     * @var HttpClientInterface
     */
    private HttpClientInterface $httpClient;

    /**
     * @var TokenManagerInterface
     */
    private TokenManagerInterface $tokenManager;

    public function __construct(HttpClientInterface $httpClient, TokenManagerInterface $tokenManager)
    {
        $this->httpClient = $httpClient;
        $this->tokenManager = $tokenManager;
    }

    /**
     * @param ApiRequestInterface $request
     *
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function request(ApiRequestInterface $request): ResponseInterface
    {
        $options = $request->getOptions();
        $options['headers']['Authorization'] = sprintf('Bearer %s', $this->tokenManager->getToken());

        return $this->httpClient->request($request->getMethod(), $request->getUrl(), $options);
    }
}
