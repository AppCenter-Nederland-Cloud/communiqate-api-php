<?php

namespace CommuniQate\Exceptions;

use CommuniQate\Objects\ApiResponse;

class ResourceNotFoundException extends ApiException
{

    public function __construct(ApiResponse $responseObject)
    {
        parent::__construct($responseObject, 'The requested resource has not been found. This can occur because of an invalid resource id sent in the request data, or simply because you try to call an endpoint that does not exist (anymore).');
    }
}