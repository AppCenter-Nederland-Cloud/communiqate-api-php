<?php

namespace CommuniQate\Resources;

use CommuniQate\Contracts\ContactsContract;
use CommuniQate\Objects\ApiResponse;

class Contacts extends BaseResource implements ContactsContract
{

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
}