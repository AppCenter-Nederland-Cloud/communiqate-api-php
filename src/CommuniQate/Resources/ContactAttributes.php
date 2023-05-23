<?php

namespace CommuniQate\Resources;

use CommuniQate\Contracts\ContactAttributesContract;
use CommuniQate\Objects\ApiResponse;

class ContactAttributes extends BaseResource implements ContactAttributesContract
{
    public function addContactAttribute(array $data): ApiResponse
    {
        return $this->makeRequest('POST', 'contactAttributes', $data);
    }

    public function getAttributes(): ApiResponse
    {
        return $this->makeRequest('GET', 'contactAttributes');
    }

    public function getContactAttributes(string $phoneOrContactId): ApiResponse
    {
        return $this->makeRequest('GET', "contacts/$phoneOrContactId/attributes");
    }

    public function setAttribute(string $contactAttributeId, string $contactId, array $data): ApiResponse
    {
        return $this->makeRequest('POST', "contactAttributes/set/$contactAttributeId/$contactId", $data);
    }

    public function setMultipleAttributes(string $contactId, array $data): ApiResponse
    {
        return $this->makeRequest('POST', "contactAttributes/set/$contactId", $data);
    }
}