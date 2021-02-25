<?php

namespace App\Salesforce;

abstract class ApiAbstractEntity implements ApiEntityInterface
{
    public const TYPE = 'type';
    public const URL  = 'url';

    private array $attributes;

    public function getType(): string
    {
        return $this->attributes[self::TYPE];
    }

    public function getUrl(): string
    {
        return $this->attributes[self::URL];
    }

    /**
     * @param array $attributes
     */
    public function setAttributes(array $attributes): void
    {
        $this->attributes = $attributes;
    }
}
