<?php

namespace App\Salesforce;

interface ApiEntityInterface
{
    /**
     * Salesforce sObject type.
     *
     * @example Contact, Account, ...
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Api url to retrieve the object
     *
     * @return string
     */
    public function getUrl(): string;
}