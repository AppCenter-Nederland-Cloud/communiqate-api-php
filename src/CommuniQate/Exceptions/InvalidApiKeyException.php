<?php

namespace CommuniQate\Exceptions;

class InvalidApiKeyException extends ApiException
{

    public function __construct()
    {
        parent::__construct(null, 'Please provide a valid API key');
    }
}