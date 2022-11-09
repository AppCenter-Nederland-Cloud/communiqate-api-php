<?php

namespace CommuniQate\Exceptions;

use CommuniQate\Objects\ApiResponse;

class UnauthorizedException extends ApiException
{

    public function __construct(ApiResponse $responseObject)
    {
        parent::__construct($responseObject, 'Your api key is not authorized to perform this action.');
    }

}