<?php

namespace App\Salesforce;

class TokenManager implements TokenManagerInterface
{
    /**
     * @var TokenProviderInterface
     */
    private TokenProviderInterface $provider;

    /**
     * @var TokenSessionManager
     */
    private TokenSessionManager $tokenSessionManager;

    /**
     * @var int
     */
    private int $maxLifetime;

    /**
     * @var TokenInterface|null
     */
    private ?TokenInterface $token = null;

    public function __construct(
        TokenProviderInterface $provider,
        TokenSessionManager $tokenSessionManager,
        int $maxLifetime
    ) {
        $this->provider = $provider;
        $this->tokenSessionManager = $tokenSessionManager;
        $this->maxLifetime = $maxLifetime;
    }

    public function getToken(): string
    {
        # Return directly the token if it's valid and fresh
        if ($this->token && !$this->hasTokenExpired()) {
            return $this->token->getToken();
        }

        # If token is present but has expired
        if ($this->token) {
            $this->setToken();
            return $this->token->getToken();
        }

        # If session token do not exists
        if (!$this->tokenSessionManager->hasSessionToken()) {
            $this->setToken();
            return $this->token->getToken();
        }

        # Get token form session
        $this->token = $this->tokenSessionManager->getSessionToken();

        # Checks if session token has expired
        if ($this->hasTokenExpired()) {
            $this->setToken();
        }

        return $this->token->getToken();
    }

    private function setToken(): void
    {
        $this->token = $this->provider->getAccessToken();
        $this->tokenSessionManager->setSessionToken($this->token);
    }

    /**
     * @return bool
     */
    private function hasTokenExpired(): bool
    {
        if (!$this->token) {
            return true;
        }

        return $this->token->hasExpired($this->maxLifetime);
    }
}