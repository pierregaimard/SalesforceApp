<?php

namespace App\Salesforce;

interface ApiRequestInterface
{
    /**
     * http request method
     *
     * @return string
     */
    public function getMethod(): string;

    /**
     * http request URL.
     *
     * @return string
     */
    public function getUrl(): string;

    /**
     * Symfony http-client request options.
     *
     * @return array
     */
    public function getOptions(): array;
}