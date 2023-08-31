<?php

namespace CommuniQate\Contracts;

use CommuniQate\Exceptions\ApiException;
use CommuniQate\Exceptions\AuthenticationException;
use CommuniQate\Exceptions\AuthorizationException;
use CommuniQate\Exceptions\NetworkException;
use CommuniQate\Exceptions\RateLimitException;
use CommuniQate\Exceptions\ResourceNotFoundException;
use CommuniQate\Exceptions\ValidationException;
use CommuniQate\Objects\ApiResponse;
use GuzzleHttp\Exception\GuzzleException;

interface ContactAttributesContract
{

    /**
     * Add a new contact attribute
     * @see https://appcenter-nederland.stoplight.io/docs/acn-cloud/53f5147e7a51f-add-contact-attribute
     *
     * @param array $data
     * @return ApiResponse
     * @throws ApiException
     * @throws AuthenticationException
     * @throws NetworkException
     * @throws RateLimitException
     * @throws ValidationException
     * @throws ResourceNotFoundException
     * @throws AuthorizationException
     * @throws GuzzleException
     */
    public function addContactAttribute(array $data): ApiResponse;

    /**
     * Get a list of all contact attributes
     * @see https://appcenter-nederland.stoplight.io/docs/acn-cloud/867e5fc73043f-list-all-contact-attributes
     *
     * @return ApiResponse
     * @throws ApiException
     * @throws AuthenticationException
     * @throws NetworkException
     * @throws RateLimitException
     * @throws ValidationException
     * @throws ResourceNotFoundException
     * @throws AuthorizationException
     * @throws GuzzleException
     */
    public function getAttributes(): ApiResponse;

    /**
     * Get a list of all attributes & values set for the contact
     * @see https://appcenter-nederland.stoplight.io/docs/acn-cloud/58b203347cbd3-get-contact-attributes
     *
     * @param string $phoneOrContactId Conversation id or phone number for fetching the contact
     *
     * @return ApiResponse
     * @throws ApiException
     * @throws AuthenticationException
     * @throws GuzzleException
     * @throws AuthorizationException
     * @throws ResourceNotFoundException
     * @throws NetworkException
     * @throws ValidationException
     * @throws RateLimitException
     */
    public function getContactAttributes(string $phoneOrContactId): ApiResponse;

    /**
     * Set single contact attribute
     * @see https://appcenter-nederland.stoplight.io/docs/acn-cloud/e3dcf2a2e40b7-set-update-contact-attribute
     *
     * @param string $contactAttributeId
     * @param string $contactId
     * @param array $data
     *
     * @return ApiResponse
     * @throws ApiException
     * @throws AuthenticationException
     * @throws NetworkException
     * @throws RateLimitException
     * @throws ValidationException
     * @throws ResourceNotFoundException
     * @throws AuthorizationException
     * @throws GuzzleException
     */
    public function setAttribute(string $contactAttributeId, string $contactId, array $data): ApiResponse;

    /**
     * Set multiple contact attributes
     * @see https://appcenter-nederland.stoplight.io/docs/acn-cloud/f79259e6373c8-set-multiple-attributes
     *
     * @param string $contactId
     * @param array $data
     *
     * @return ApiResponse
     * @throws ApiException
     * @throws AuthenticationException
     * @throws NetworkException
     * @throws RateLimitException
     * @throws ValidationException
     * @throws ResourceNotFoundException
     * @throws AuthorizationException
     * @throws GuzzleException
     */
    public function setMultipleAttributes(string $contactId, array $data): ApiResponse;


}