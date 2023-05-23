<?php

namespace CommuniQate\Resources;

use CommuniQate\Contracts\ContactsContract;
use CommuniQate\Objects\ApiResponse;

class Contacts extends BaseResource implements ContactsContract
{
    public function addContact(array $data): ApiResponse
    {
        return $this->makeRequest('POST', 'contacts', $data);
    }

    public function deleteContact(string $phoneOrContactId): ApiResponse
    {
        return $this->makeRequest('DELETE', "contacts/$phoneOrContactId");
    }

    public function getContact(string $phoneOrContactId): ApiResponse
    {
        return $this->makeRequest('GET', "contacts/$phoneOrContactId");
    }

    public function getContacts(
        int     $page = 1,
        int     $rowsPerPage = 10,
        ?array  $filters = null,
        ?string $sortField = null,
        ?string $sortDir = null,
        ?string $search = null
    ): ApiResponse
    {
        return $this->makeRequest('GET', 'contacts', [
            'page' => $page,
            'rows_per_page' => $rowsPerPage,
            'filters' => $filters,
            'sort_field' => $sortField,
            'sort_dir' => $sortDir,
            'search' => $search,
        ]);
    }

    public function updateContact(string $phoneOrContactId, array $data): ApiResponse
    {
        return $this->makeRequest('PATCH', "contacts/$phoneOrContactId", $data);
    }
}