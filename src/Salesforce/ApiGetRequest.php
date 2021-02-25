<?php

namespace App\Salesforce;

class ApiGetRequest implements ApiRequestInterface
{
    /**
     * @var string
     */
    private const METHOD = 'GET';

    /**
     * @param string $url
     * @param array  $options
     */
    public function __construct(private string $url, private array $options = [])
    {
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
        return self::METHOD;
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
