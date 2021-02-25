<?php

namespace App\Salesforce;

class ApiGetRequest implements ApiRequestInterface
{
    /**
     * @var string
     */
    private string $method = 'GET';

    /**
     * @var string
     */
    private string $url;

    /**
     * @var array
     */
    private array $options;

    /**
     * @param string $url
     * @param array  $options
     */
    public function __construct(string $url, array $options = [])
    {
        $this->url = $url;
        $this->options = array_merge_recursive($options, $this->setOptionsHeaders());
        $this->options = array_unique($this->options);
    }

    /**
     * @return string[][]
     */
    private function setOptionsHeaders(): array
    {
        return [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ];
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options): void
    {
        $this->options = $options;
    }
}
