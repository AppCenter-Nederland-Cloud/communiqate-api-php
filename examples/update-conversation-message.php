<?php

require_once __DIR__ . '/../vendor/autoload.php';

use CommuniQate\ApiClient;
use CommuniQate\Exceptions\ValidationException;

const API_KEY = '';

const MESSAGE_ID = '';
const PHONE_NUMBER = '+31612345678';
const NEW_DATE = '2022-12-20T12:00:00Z';

$communiqate = new ApiClient(API_KEY);

try {
    $response = $communiqate->conversations()->updateMessage(PHONE_NUMBER, [
        'message_id' => MESSAGE_ID,
        'scheduled_at' => NEW_DATE,
    ]);


    if ($response->success) {
        print "Successfully updated message! ID: ". MESSAGE_ID . " \n";
        var_dump($response->data);
    }
} catch (ValidationException $exception) {
    print $exception->getMessage() . "\n";
    var_dump("Errors:", $exception->getErrors());
}