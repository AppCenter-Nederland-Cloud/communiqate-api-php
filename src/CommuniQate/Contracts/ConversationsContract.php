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
     * Check if the conversation has autopilot enabled
     * @param string $conversationIdOrPhone Conversation id or phone number for fetching the conversation
     *
     * @return ApiResponse<{enabled: boolean}>
     *
     * @throws GuzzleException
     * @throws UnauthorizedException
     * @throws ResourceNotFoundException
     * @throws NetworkException
     * @throws ValidationException
     * @throws RateLimitException
     */
    public function checkAutopilot(string $conversationIdOrPhone): ApiResponse;

    /**
     * Toggle the autopilot for the given conversation
     * @param string $conversationIdOrPhone Conversation id or phone number for fetching the conversation
     * @param array $body
     * Available options:
     *  enabled => boolean      If autopilot is enabled for the conversation
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
    public function toggleAutoPilot(string $conversationIdOrPhone, array $body): ApiResponse;

    /**
     * (Un)assign an operator to the given conversation
     * @param string $conversationIdOrPhone Conversation id or phone number for fetching the conversation
     * @param array $body
     * Available options:
     *  operator_id => string|null      Set to 'null' if you want to de-assign the current operator
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
    public function assignOperator(string $conversationIdOrPhone, array $body): ApiResponse;

    /**
     * Send or schedule a template message for the conversation.
     * @param string $conversationIdOrPhone Conversation id or phone number for fetching the conversation
     * @param array $body
     * Available options:
     *  scheduled_at => string|null     (Optional) A string containing a date in the future. UTC format. Set to 'null' to send instantly
     *  template_message_id => string   The id of the template message that should be sent
     *  variables   => Array            (Optional) An array of variables for the template message
     *      header      => string       (Optional) A string containing the header variable. (Max 14 characters)
     *      body        => string[]     (Optional) An array containing the body variables.
     *      buttons     => string[]     (Optional) An array containing the button variables. (Max 20 characters)
     *  contact     => Array            (Optional) An array containing additional contact information. (for new contacts only)
     *      first_name  => string       (Optional) The first name of the contact (for new contacts only)
     *      last_name   => string       (Optional) The last name of the contact (for new contacts only)
     *      country     => string       (Optional) An Alpha2 country code for the contact (for new contacts only)
     *
     * @return ApiResponse<MessageObject>
     *
     * @throws GuzzleException
     * @throws UnauthorizedException
     * @throws ResourceNotFoundException
     * @throws NetworkException
     * @throws ValidationException
     * @throws RateLimitException
     */
    public function sendMessage(string $conversationIdOrPhone, array $body): ApiResponse;

    /**
     * Update a message. Only messages with status PENDING_QUEUE can be updated
     * @param string $conversationIdOrPhone Conversation id or phone number for fetching the conversation
     * @param array $body
     * Available options:
     *  scheduled_at => string          A string containing a date in the future. UTC format.
     *  message_id  => string           The id of the message that should be updated
     *
     * @return ApiResponse<MessageObject>
     *
     * @throws GuzzleException
     * @throws UnauthorizedException
     * @throws ResourceNotFoundException
     * @throws NetworkException
     * @throws ValidationException
     * @throws RateLimitException
     */
    public function updateMessage(string $conversationIdOrPhone, array $body): ApiResponse;

    /**
     * Delete a message. Only messages with status PENDING_QUEUE can be deleted
     * @param string $conversationIdOrPhone Conversation id or phone number for fetching the conversation
     * @param array $body
     * Available options:
     *  message_id  => string           The id of the message that should be deleted
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
    public function deleteMessage(string $conversationIdOrPhone, array $body): ApiResponse;

}