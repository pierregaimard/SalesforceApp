<?php

namespace App\Salesforce;

use App\Entity\Token;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\Exception\{
    ClientExceptionInterface,
    RedirectionExceptionInterface,
    ServerExceptionInterface,
    TransportExceptionInterface
};

class ApiTokenProvider implements TokenProviderInterface
{
    private const OAUTH_TOKEN_ENDPOINT_URL = 'https://login.salesforce.com/services/oauth2/token';
    private const GRANT_TYPE = 'password';

    private const KEY_GRANT_TYPE = 'grant_type';
    private const KEY_CLIENT_ID = 'client_id';
    private const KEY_CLIENT_SECRET = 'client_secret';
    private const KEY_USERNAME = 'username';
    private const KEY_PASSWORD = 'password';

    /**
     * @var HttpClientInterface
     */
    private HttpClientInterface $httpClient;

    /**
     * @var SerializerInterface
     */
    private SerializerInterface $serializer;

    /**
     * @var string
     */
    private string $sfClientId;

    /**
     * @var string
     */
    private string $sfClientSecret;

    /**
     * @var string
     */
    private string $sfUsername;

    /**
     * @var string
     */
    private string $sfPassword;

    public function __construct(
        HttpClientInterface $httpClient,
        SerializerInterface $serializer,
        string $sfClientId,
        string $sfClientSecret,
        string $sfUsername,
        string $sfPassword
    ) {
        $this->httpClient = $httpClient;
        $this->sfClientId = $sfClientId;
        $this->sfClientSecret = $sfClientSecret;
        $this->sfUsername = $sfUsername;
        $this->sfPassword = $sfPassword;
        $this->serializer = $serializer;
    }

    /**
     * @return TokenInterface
     * @throws AuthenticationFailureException
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getAccessToken(): TokenInterface
    {
        $response = $this->httpClient->request('POST', self::OAUTH_TOKEN_ENDPOINT_URL, [
            'headers' => [
                'Accept' => 'application/json'
            ],
            'body' => [
                self::KEY_GRANT_TYPE => self::GRANT_TYPE,
                self::KEY_CLIENT_ID => $this->sfClientId,
                self::KEY_CLIENT_SECRET => $this->sfClientSecret,
                self::KEY_USERNAME => $this->sfUsername,
                self::KEY_PASSWORD => $this->sfPassword,
            ]
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new AuthenticationFailureException(
                sprintf(
                    'The authentication has failed with Code: %s and message: "%s"',
                    $response->getStatusCode(),
                    $response->getContent(false)
                )
            );
        }

        return $this->serializer->deserialize($response->getContent(), Token::class, 'json');
    }
}
