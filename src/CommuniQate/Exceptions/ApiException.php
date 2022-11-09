<?php

namespace CommuniQate\Exceptions;

use CommuniQate\Objects\ApiResponse;
use Exception;

class ApiException extends Exception
{
    /**
     * The ApiResponse object
     * @var ApiResponse
     */
    protected ApiResponse $responseObject;

    /**
     * The errors
     * @var array
     */
    protected array $errors = [];

    /**
     * @param ApiResponse $responseObject
     * @param string|null $message
     * @param array $errors
     */
    public function __construct(?ApiResponse $responseObject = null, ?string $message = null, ?array $errors = null)
    {
        parent::__construct($message ?? $responseObject->message ?? '');
        $this->responseObject = $responseObject;
        $this->errors = $errors ?? $responseObject->errors ?? [];
    }

    /**
     * @return ApiResponse
     */
    public function getResponseObject(): ApiResponse
    {
        return $this->responseObject;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}