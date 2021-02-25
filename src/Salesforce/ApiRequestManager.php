<?php

namespace App\Salesforce;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class ApiRequestManager implements ApiRequestManagerInterface
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private TokenManagerInterface $tokenManager)
    {}

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
