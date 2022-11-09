<?php

namespace CommuniQate\Objects;

class ApiResponse
{
    /**
     * The raw response body
     * @var array
     */
    public array $rawResponse;

    /**
     * Status code for the response
     * @var int
     */
    public int $status = 200;

    /**
     * The message sent with the response
     * @var string
     */
    public string $message = '';

    /**
     * The data array sent with the response
     * @var array
     */
    public array $data = [];

    /**
     * If the request was successful or not
     * @var bool
     */
    public bool $success = true;

    /**
     * The errors returned with the response
     * @var array
     */
    public array $errors = [];

    /**
     * @param array $rawResponse
     */
    public function __construct(array $rawResponse)
    {
        $this->rawResponse = $rawResponse;
    }

    /**
     * Load this object from an array
     * @param array $data
     * @return ApiResponse
     */
    public static function fromArray(array $data = []): ApiResponse
    {
        foreach (get_object_vars($obj = new self($data)) as $property => $default) {
            if (!array_key_exists($property, $data)) {
                continue;
            }

            $obj->{$property} = $data[$property];
        }

        return $obj;
    }
}