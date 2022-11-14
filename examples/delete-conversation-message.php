<?php

require_once __DIR__ . '/../vendor/autoload.php';

use CommuniQate\ApiClient;
use CommuniQate\Exceptions\ValidationException;

const API_KEY = '';

const MESSAGE_ID = '';
const PHONE_NUMBER = '+31612345678';


$communiqate = new ApiClient(API_KEY);

try {
    $response = $communiqate->conversations()->deleteMessage(PHONE_NUMBER, [
        'message_id' => MESSAGE_ID,
    ]);


    if ($response->success) {
        print "Successfully deleted message! ID: ". MESSAGE_ID ."  \n";
        var_dump($response->data);
    }
} catch (ValidationException $exception) {
    print $exception->getMessage() . "\n";
    var_dump("Errors:", $exception->getErrors());
}