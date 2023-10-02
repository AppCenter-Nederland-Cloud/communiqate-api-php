<?php

namespace CommuniQate\Resources;

use CommuniQate\Exceptions\ApiException;
use CommuniQate\Exceptions\AuthenticationException;
use CommuniQate\Exceptions\AuthorizationException;
use CommuniQate\Exceptions\ContactOptOutException;
use CommuniQate\Exceptions\InvalidPhoneException;
use CommuniQate\Exceptions\NetworkException;
use CommuniQate\Exceptions\RateLimitException;
use CommuniQate\Exceptions\ResourceNotFoundException;
use CommuniQate\Exceptions\ValidationException;
use CommuniQate\Objects\ApiResponse;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Extended by Resource classes
 */
abstract class BaseResource
{
    /**
     * Injected Client instance
     * @var Client
     */
    private Client $httpClient;

    /**
     * BaseResource constructor
     * @param Client $httpClient
     */
    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Make the request
     * @param string $method The method used for the request
     * @param string $uri The uri for the request
     * @param array $data Optional: The data send with the request
     * @param array $requestOptions Optional: Additional options for the request. 'body' is not supported since it is set by $data
     *
     * @return ApiResponse
     *
     * @throws NetworkException
     * @throws AuthenticationException
     * @throws RateLimitException
     * @throws ResourceNotFoundException
     * @throws AuthorizationException
     * @throws ValidationException
     * @throws GuzzleException
     * @throws ApiException
     */
    protected function makeRequest(string $method, string $uri, array $data = [], array $requestOptions = []): ApiResponse
    {
        if (!empty($data)) {
            $requestOptions['body'] = json_encode($data);
        }

        try {
            $response = $this->getHttpClient()->request($method, $uri, $requestOptions);
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
        }

        $statusCode = $response->getStatusCode();

        $json = $response->getBody()->getContents();
        $array = json_decode($json, true);

        $array['status'] = $statusCode;
        $responseObject = ApiResponse::fromArray($array);

        if (($statusCode !== 200 && $statusCode !== 201) || !$responseObject->success) {

            $reason = $responseObject->errors['reason'] ?? null;

            if ($reason == 'contact_opt_out') {
                throw new ContactOptOutException($responseObject);
            }

            if ($reason == 'invalid_phone_number') {
                throw new InvalidPhoneException($responseObject);
            }

            switch ($responseObject->status) {
                case 401:
                    throw new AuthenticationException($responseObject);
                case 403:
                    throw new AuthorizationException($responseObject);
                case 404:
                    throw new ResourceNotFoundException($responseObject);
                case 422:
                    throw new ValidationException($responseObject);
                case 429:
                    throw new RateLimitException($responseObject);
                case 500:
                    throw new NetworkException($responseObject);
                default:
                    throw new ApiException($responseObject);
            }
        }

        return $responseObject;
    }


    /**
     * Return the injected client
     * @return Client
     */
    final public function getHttpClient(): Client
    {
        return $this->httpClient;
    }
}