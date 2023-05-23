<?php

namespace CommuniQate;

use CommuniQate\Exceptions\InvalidApiKeyException;
use CommuniQate\Exceptions\InvalidEndpointException;
use CommuniQate\Traits\HandlesResources;
use GuzzleHttp\Client;

class ApiClient
{
    use HandlesResources;

    /**
     * Major version of the API client
     */
    public const VERSION = 2;

    /**
     * The default API endpoint
     * @var string
     */
    private string $apiEndpoint = 'https://api.acncloud.nl/api/v1/';

    /**
     * The Bearer api token
     * @var string
     */
    private string $apiKey;

    /**
     * Guzzle HTTP client
     * @var Client
     */
    private Client $httpClient;

    /**
     * Id of the organization making the request
     * @var string
     */
    private string $organizationId;

    /**
     * @param string $apiKey
     * @param string $organizationId
     * @param string|null $apiEndpoint
     * @throws InvalidApiKeyException
     * @throws InvalidEndpointException
     */
    public function __construct(string $apiKey, string $organizationId, ?string $apiEndpoint = null)
    {
        $this->apiKey = $apiKey;

        if ($apiEndpoint) {
            $this->apiEndpoint = $this->formatEndpoint($apiEndpoint);
        }

        $this->httpClient = new Client([
            'base_uri' => $this->apiEndpoint . "$organizationId/communiqate/",
            'headers' => [
                'Content-Type' => 'application/json',
                'User-Agent' => 'CommuniQate-PHP-Client-' . self::VERSION,
                'Authorization' => $this->formatApiKey($apiKey)
            ],
        ]);
    }

    /**
     * Format & validate the endpoint
     * @param string $endpoint
     * @return string
     * @throws InvalidEndpointException
     */
    private function formatEndpoint(string $endpoint): string
    {
        if (empty($endpoint)) {
            throw new InvalidEndpointException();
        }

        /**
         * Append an '/' to the end of the endpoint url if it is not set.
         */
        if ($endpoint[strlen($endpoint) - 1] !== '/') {
            $endpoint = $endpoint . "/";
        }

        return $endpoint;
    }

    /**
     * Checks if the 'Bearer' keyword is present, if not it prepends 'Bearer ' to the token.
     * @param string $apiKey
     * @return string
     * @throws InvalidApiKeyException
     */
    private function formatApiKey(string $apiKey): string
    {
        if (empty($apiKey)) {
            throw new InvalidApiKeyException();
        }

        if (strpos($apiKey, 'Bearer') > -1) {
            return $apiKey;
        }

        return "Bearer $apiKey";
    }

    /**
     * @return string
     */
    public function getApiEndpoint(): string
    {
        return $this->apiEndpoint;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @return Client
     */
    public function getHttpClient(): Client
    {
        return $this->httpClient;
    }

}