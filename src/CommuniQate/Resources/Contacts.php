<?php

namespace CommuniQate\Resources;

use CommuniQate\Contracts\ContactsContract;
use CommuniQate\Objects\ApiResponse;

class Contacts extends BaseResource implements ContactsContract
{
    public function getContact(string $phoneOrContactId): ApiResponse
    {
        return $this->makeRequest('GET', "contacts/$phoneOrContactId");
    }

    public function getContactAttributeValues(string $phoneOrContactId): ApiResponse
    {
        return $this->makeRequest('GET', "contacts/$phoneOrContactId/attributes");
    }

    public function setContactAttributeValue(string $phoneOrContactId, array $data): ApiResponse
    {
        return $this->makeRequest('POST', "contacts/$phoneOrContactId/attributes", $data);
    }

    public function unsetContactAttributeValue(string $phoneOrContactId, array $data): ApiResponse
    {
        return $this->makeRequest('DELETE', "contacts/$phoneOrContactId/attributes", $data);
    }

    public function unsubscribeContact(string $phoneOrContactId): ApiResponse
    {
        return $this->makeRequest('POST', "contacts/$phoneOrContactId/unsubscribe");
    }

    public function updateContact(string $phoneOrContactId, array $data): ApiResponse
    {
        return $this->makeRequest('PATCH', "contacts/$phoneOrContactId", $data);
    }
}