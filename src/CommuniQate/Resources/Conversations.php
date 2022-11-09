<?php

namespace CommuniQate\Resources;

use CommuniQate\Contracts\ConversationsContract;
use CommuniQate\Objects\ApiResponse;

class Conversations extends BaseResource implements ConversationsContract
{

    public function checkAutopilot(string $conversationIdOrPhone): ApiResponse
    {
        return $this->makeRequest('GET', "conversations/$conversationIdOrPhone/autopilot");
    }

    public function toggleAutoPilot(string $conversationIdOrPhone, array $body): ApiResponse
    {
        return $this->makeRequest('PATCH', "conversations/$conversationIdOrPhone/autopilot", $body);
    }

    public function assignOperator(string $conversationIdOrPhone, array $body): ApiResponse
    {
        return $this->makeRequest('POST', "conversations/$conversationIdOrPhone/operator/assign", $body);
    }

    public function sendMessage(string $conversationIdOrPhone, array $body): ApiResponse
    {
        return $this->makeRequest('POST', "conversations/$conversationIdOrPhone/messages", $body);
    }

    public function updateMessage(string $conversationIdOrPhone, array $body): ApiResponse
    {
        return $this->makeRequest('PATCH', "conversations/$conversationIdOrPhone/messages", $body);
    }

    public function deleteMessage(string $conversationIdOrPhone, array $body): ApiResponse
    {
        return $this->makeRequest('DELETE', "conversations/$conversationIdOrPhone/messages", $body);
    }
}