<?php

namespace CommuniQate\Contracts;

use CommuniQate\Exceptions\NetworkException;
use CommuniQate\Exceptions\RateLimitException;
use CommuniQate\Exceptions\ResourceNotFoundException;
use CommuniQate\Exceptions\UnauthorizedException;
use CommuniQate\Exceptions\ValidationException;
use CommuniQate\Objects\ApiResponse;
use GuzzleHttp\Exception\GuzzleException;

interface MessagesContract
{

    /**
     * Delete a single message
     * @see https://appcenter-nederland.stoplight.io/docs/acn-cloud/36a0bd97693f9-delete-message
     * @param string $messageId
     *
     * @return ApiResponse
     * @throws GuzzleException
     * @throws UnauthorizedException
     * @throws ResourceNotFoundException
     * @throws NetworkException
     * @throws ValidationException
     * @throws RateLimitException
     */
    public function deleteMessage(string $messageId): ApiResponse;

    /**
     * Get a single message
     * @see https://appcenter-nederland.stoplight.io/docs/acn-cloud/50f8cc97b5048-get-a-message
     * @param string $messageId
     *
     * @return ApiResponse
     * @throws GuzzleException
     * @throws UnauthorizedException
     * @throws ResourceNotFoundException
     * @throws NetworkException
     * @throws ValidationException
     * @throws RateLimitException
     */
    public function getMessage(string $messageId): ApiResponse;

    /**
     * Send a message to a single contact
     * @see https://appcenter-nederland.stoplight.io/docs/acn-cloud/00189737ddaf6-send-a-message
     *
     * @param string $identifier
     * @param array $data
     *
     * @return ApiResponse
     * @throws GuzzleException
     * @throws UnauthorizedException
     * @throws ResourceNotFoundException
     * @throws NetworkException
     * @throws ValidationException
     * @throws RateLimitException
     */
    public function sendMessage(string $identifier, array $data): ApiResponse;

    /**
     * Update a single message
     * @see https://appcenter-nederland.stoplight.io/docs/acn-cloud/395290dc124e1-update-message
     * @param string $messageId
     * @param array $data
     *
     * @return ApiResponse
     * @throws GuzzleException
     * @throws UnauthorizedException
     * @throws ResourceNotFoundException
     * @throws NetworkException
     * @throws ValidationException
     * @throws RateLimitException
     */
    public function updateMessage(string $messageId, array $data): ApiResponse;

}