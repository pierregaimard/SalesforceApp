<?php

namespace App\Salesforce;

use App\Entity\Token;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Serializer\SerializerInterface;

class TokenSessionManager
{
    private const KEY_SF_TOKEN = 'SF_TOKEN';

    public function __construct(
        private SessionInterface $session,
        private SerializerInterface $serializer)
    {}

    /**
     * @param TokenInterface $token
     */
    public function setSessionToken(TokenInterface $token): void
    {
        $this->session->set(self::KEY_SF_TOKEN, $this->serializer->serialize($token, 'json'));
    }

    /**
     * @return TokenInterface
     */
    public function getSessionToken(): TokenInterface
    {
        return $this->serializer->deserialize($this->session->get(self::KEY_SF_TOKEN), Token::class, 'json');
    }

    /**
     * @return bool
     */
    public function hasSessionToken(): bool
    {
        return $this->session->has(self::KEY_SF_TOKEN);
    }
}
