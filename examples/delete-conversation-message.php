<?php

require_once __DIR__ . '/../vendor/autoload.php';

use CommuniQate\ApiClient;
use CommuniQate\Exceptions\ValidationException;

const API_KEY = '';
const ORGANIZATION_ID = '';
const MESSAGE_ID = '';
const PHONE_NUMBER = '+31612345678';

$communiqate = new ApiClient(API_KEY, ORGANIZATION_ID);

try {
    $response = $communiqate->messages()->deleteMessage(MESSAGE_ID);

    if ($response->success) {
        var_dump($response->data);
        print "Successfully deleted message! ID: " . MESSAGE_ID . "  \n";
    }
} catch (ValidationException $exception) {
    print $exception->getMessage() . "\n";
    var_dump("Errors:", $exception->getErrors());
}