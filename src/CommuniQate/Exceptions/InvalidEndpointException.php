<?php

namespace CommuniQate\Exceptions;

class InvalidEndpointException extends ApiException
{

    public function __construct()
    {
        parent::__construct(null, 'Please provide a valid API endpoint');
    }
}