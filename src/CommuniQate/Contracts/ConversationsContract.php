<?php

namespace CommuniQate\Contracts;

use CommuniQate\Exceptions\NetworkException;
use CommuniQate\Exceptions\RateLimitException;
use CommuniQate\Exceptions\ResourceNotFoundException;
use CommuniQate\Exceptions\UnauthorizedException;
use CommuniQate\Exceptions\ValidationException;
use CommuniQate\Objects\ApiResponse;
use GuzzleHttp\Exception\GuzzleException;

interface ConversationsContract
{
    /**
     * Get a single conversation
     * @see https://appcenter-nederland.stoplight.io/docs/acn-cloud/e63cfe224c963-get-single-conversation
     *
     * @param string $conversationId
     *
     * @return ApiResponse
     * @throws GuzzleException
     * @throws UnauthorizedException
     * @throws ResourceNotFoundException
     * @throws NetworkException
     * @throws ValidationException
     * @throws RateLimitException
     */
    public function getConversation(string $conversationId): ApiResponse;

    /**
     * Update a single conversation
     * @see https://appcenter-nederland.stoplight.io/docs/acn-cloud/592af5266f730-update-conversation
     *
     * @param string $conversationId
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
    public function updateConversation(string $conversationId, array $data): ApiResponse;
}