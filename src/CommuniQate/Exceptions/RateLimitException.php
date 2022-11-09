<?php

namespace CommuniQate\Exceptions;

use CommuniQate\Objects\ApiResponse;

class RateLimitException extends ApiException
{

    public function __construct(ApiResponse $responseObject)
    {
        parent::__construct($responseObject, 'You have hit the rate-limit for your api key.');
    }
}