<?php

namespace CommuniQate\Exceptions;

use CommuniQate\Objects\ApiResponse;

class AuthenticationException extends ApiException
{

    public function __construct(ApiResponse $responseObject)
    {
        parent::__construct($responseObject, 'Unable to authenticate with the current api key. Make sure it is still valid and/or is not revoked.');
    }

}