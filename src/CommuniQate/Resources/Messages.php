<?php

namespace CommuniQate\Resources;

use CommuniQate\Contracts\MessagesContract;
use CommuniQate\Objects\ApiResponse;

class Messages extends BaseResource implements MessagesContract
{

    public function deleteMessage(string $messageId): ApiResponse
    {
        return $this->makeRequest('DELETE', "conversationMessages/$messageId");
    }

    public function getMessage(string $messageId): ApiResponse
    {
        return $this->makeRequest('GET', "conversationMessages/$messageId");
    }

    public function sendMessage(string $identifier, array $data): ApiResponse
    {
        return $this->makeRequest('POST', "conversationMessages/$identifier", $data);
    }

    public function updateMessage(string $messageId, array $data): ApiResponse
    {
        return $this->makeRequest('PATCH', "conversationMessages/$messageId", $data);
    }
}