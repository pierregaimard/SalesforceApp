<?php

namespace App\Entity;

class Token
{
    /**
     * @var string
     */
    private string $accessToken;

    /**
     * @var string
     */
    private string $instanceUrl;

    /**
     * @var string
     */
    private string $id;

    /**
     * @var string
     */
    private string $tokenBearer;

    /**
     * @var string
     */
    private string $issuedAt;

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken(string $accessToken): void
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @return string
     */
    public function getInstanceUrl(): string
    {
        return $this->instanceUrl;
    }

    /**
     * @param string $instanceUrl
     */
    public function setInstanceUrl(string $instanceUrl): void
    {
        $this->instanceUrl = $instanceUrl;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTokenBearer(): string
    {
        return $this->tokenBearer;
    }

    /**
     * @param string $tokenBearer
     */
    public function setTokenBearer(string $tokenBearer): void
    {
        $this->tokenBearer = $tokenBearer;
    }

    /**
     * @return string
     */
    public function getIssuedAt(): string
    {
        return $this->issuedAt;
    }

    /**
     * @param string $issuedAt
     */
    public function setIssuedAt(string $issuedAt): void
    {
        $this->issuedAt = $issuedAt;
    }
}
