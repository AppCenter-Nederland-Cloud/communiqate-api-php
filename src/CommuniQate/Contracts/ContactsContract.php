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

interface ContactsContract
{

    /**
     * Add a new contact
     * @see https://appcenter-nederland.stoplight.io/docs/acn-cloud/64c7f5e302194-add-contact
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
    public function addContact(array $data): ApiResponse;

    /**
     * Delete a contact by phoneNumber or contact id
     * @see https://appcenter-nederland.stoplight.io/docs/acn-cloud/54e5af846897f-get-contact
     *
     * @param string $phoneOrContactId
     * @return ApiResponse
     * @throws ApiException
     * @throws AuthenticationException
     * @throws NetworkException
     * @throws RateLimitException
     * @throws ValidationException
     * @throws ResourceNotFoundException
     * @throws AuthorizationException
     * @throws GuzzleException
     *
     */
    public function deleteContact(string $phoneOrContactId): ApiResponse;

    /**
     * Get a contact by phoneNumber or contact id
     * @see https://appcenter-nederland.stoplight.io/docs/acn-cloud/54e5af846897f-get-contact
     *
     * @param string $phoneOrContactId
     * @return ApiResponse
     * @throws ApiException
     * @throws AuthenticationException
     * @throws NetworkException
     * @throws RateLimitException
     * @throws ValidationException
     * @throws ResourceNotFoundException
     * @throws AuthorizationException
     * @throws GuzzleException
     *
     */
    public function getContact(string $phoneOrContactId): ApiResponse;


    /**
     * Get a paginated list of contacts
     * @see https://appcenter-nederland.stoplight.io/docs/acn-cloud/6bc694dfd1fa9-list-all-contacts
     *
     * @param int $page
     * @param int $rowsPerPage
     * @param array|null $filters
     * @param string|null $sortField
     * @param string|null $sortDir
     * @param string|null $search
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
    public function getContacts(
        int     $page = 1,
        int     $rowsPerPage = 10,
        ?array  $filters = null,
        ?string $sortField = null,
        ?string $sortDir = null,
        ?string $search = null
    ): ApiResponse;

    /**
     * Updates a contact by phoneNumber or contact id
     * @see https://appcenter-nederland.stoplight.io/docs/acn-cloud/d059b6edf9c8f-update-contact
     *
     * @param string $phoneOrContactId
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
    public function updateContact(string $phoneOrContactId, array $data): ApiResponse;


}