<?php

namespace CommuniQate\Exceptions;

use CommuniQate\Objects\ApiResponse;

class ValidationException extends ApiException
{

    public function __construct(ApiResponse $responseObject)
    {
        parent::__construct($responseObject, "A validation error occurred. Message: {$responseObject->message}");
    }

}