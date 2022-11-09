<?php

namespace CommuniQate\Exceptions;

use CommuniQate\Objects\ApiResponse;

class NetworkException extends ApiException
{

    public function __construct(ApiResponse $responseObject)
    {
        parent::__construct($responseObject, 'Server error');
    }
}