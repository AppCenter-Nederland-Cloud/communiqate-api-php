<?php

namespace CommuniQate\Contracts;

use CommuniQate\Exceptions\NetworkException;
use CommuniQate\Exceptions\RateLimitException;
use CommuniQate\Exceptions\ResourceNotFoundException;
use CommuniQate\Exceptions\UnauthorizedException;
use CommuniQate\Exceptions\ValidationException;
use CommuniQate\Objects\ApiResponse;
use GuzzleHttp\Exception\GuzzleException;

interface ContactsContract
{
    /**
     * Get a list of all attributes & values set for the contact
     * @param string $phoneOrContactId Conversation id or phone number for fetching the contact
     *
     * @return ApiResponse<{attribute: ContactAttribute, value: string}[]>
     *
     * @throws GuzzleException
     * @throws UnauthorizedException
     * @throws ResourceNotFoundException
     * @throws NetworkException
     * @throws ValidationException
     * @throws RateLimitException
     */
    public function getContactAttributeValues(string $phoneOrContactId): ApiResponse;

    /**
     * Set an attribute value for the contact
     * @param string $phoneOrContactId Conversation id or phone number for fetching the contact
     * @param array $data
     * Available options:
     *  contact_attribute_id => string      The id of the attribute
     *  value                => string      The value that should be set. Keep the type of the attribute in mind when setting this
     *
     * @return ApiResponse
     *
     * @throws GuzzleException
     * @throws UnauthorizedException
     * @throws ResourceNotFoundException
     * @throws NetworkException
     * @throws ValidationException
     * @throws RateLimitException
     */
    public function setContactAttributeValue(string $phoneOrContactId, array $data): ApiResponse;

    /**
     * Unset a contact attribute
     * @param string $phoneOrContactId Conversation id or phone number for fetching the contact
     * @param array $data
     * Available options:
     *  contact_attribute_id => string      The id of the attribute
     *
     * @return ApiResponse
     *
     * @throws GuzzleException
     * @throws UnauthorizedException
     * @throws ResourceNotFoundException
     * @throws NetworkException
     * @throws ValidationException
     * @throws RateLimitException
     */
    public function unsetContactAttributeValue(string $phoneOrContactId, array $data): ApiResponse;

    /**
     * Unsubscribe the contact
     * @param string $phoneOrContactId Conversation id or phone number for fetching the contact
     *
     * @return ApiResponse
     *
     * @throws GuzzleException
     * @throws UnauthorizedException
     * @throws ResourceNotFoundException
     * @throws NetworkException
     * @throws ValidationException
     * @throws RateLimitException
     */
    public function unsubscribeContact(string $phoneOrContactId): ApiResponse;

}