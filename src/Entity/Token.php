<?php

namespace App\Entity;

use App\Salesforce\TokenInterface;
use \DateTime;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\Ignore;

class Token implements TokenInterface
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
     * @var DateTime
     * @Ignore()
     */
    private DateTime $createdAt;

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
        $this->setCreatedAt();
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(): void
    {
        $timestamp = substr($this->issuedAt, 0, -3);
        $date = new DateTime();
        $date->setTimestamp($timestamp);

        $this->createdAt = $date;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param int $maxLifetime
     *
     * @return bool
     */
    public function hasExpired(int $maxLifetime): bool
    {
        $expiredTime = new DateTime();
        $expiredTime->modify('-'. $maxLifetime .' second');

        return $expiredTime > $this->getCreatedAt();
    }
}
