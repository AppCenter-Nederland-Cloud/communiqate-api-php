<?php

require_once __DIR__ . '/../vendor/autoload.php';

use CommuniQate\ApiClient;
use CommuniQate\Exceptions\ValidationException;

const API_KEY = '';

const TEMPLATE_MESSAGE_ID = '';
const PHONE_NUMBER = '+31612345678';
const DATE = '2022-12-20T12:00:00Z';

$communiqate = new ApiClient(API_KEY);

try {
    $response = $communiqate->conversations()->sendMessage(PHONE_NUMBER, [
        'scheduled_at' => DATE,
        'template_message_id' => TEMPLATE_MESSAGE_ID,
        'variables' => [
            'header' => '',
            'body' => [],
            'buttons' => [],
        ],
        'contact' => [ //Only use for new contacts. Will be ignored for existing contacts.
            'first_name' => 'Frits',
            'last_name' => 'Fictief',
            'country' => 'nl'
        ]
    ]);

    if ($response->success) {
        print "Successfully scheduled message! ID: {$response->data['id']}  \n";
        var_dump($response->data);
    }
} catch (ValidationException $exception) {
    print $exception->getMessage() . "\n";
    var_dump("Errors:", $exception->getErrors());
}