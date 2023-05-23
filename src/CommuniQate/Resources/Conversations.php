<?php

namespace CommuniQate\Resources;

use CommuniQate\Contracts\ConversationsContract;
use CommuniQate\Objects\ApiResponse;

class Conversations extends BaseResource implements ConversationsContract
{
    public function getConversation(string $conversationId): ApiResponse
    {
        return $this->makeRequest('GET', "conversations/$conversationId");
    }

    public function updateConversation(string $conversationId, array $data): ApiResponse
    {
        return $this->makeRequest('GET', "conversations/$conversationId", $data);
    }
}