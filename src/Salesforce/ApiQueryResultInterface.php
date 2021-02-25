<?php

namespace App\Salesforce;

interface ApiQueryResultInterface
{
    /**
     * Should return an array of query results
     *
     * @return array
     */
    public function getRecords(): array;
}