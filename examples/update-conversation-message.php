<?php

require_once __DIR__ . '/../vendor/autoload.php';

use CommuniQate\ApiClient;
use CommuniQate\Exceptions\ValidationException;

const API_KEY = '';
const ORGANIZATION_ID = '';
const MESSAGE_ID = '';
const NEW_DATE = '2023-05-25T12:00:00Z';

$communiqate = new ApiClient(API_KEY, ORGANIZATION_ID);

try {
    $response = $communiqate->messages()->updateMessage(MESSAGE_ID, [
        'scheduled_at' => NEW_DATE,
    ]);

    if ($response->success) {
        var_dump($response->data);
        print "Successfully updated message! ID: " . MESSAGE_ID . " \n";
    }
} catch (ValidationException $exception) {
    print $exception->getMessage() . "\n";
    var_dump("Errors:", $exception->getErrors());
}