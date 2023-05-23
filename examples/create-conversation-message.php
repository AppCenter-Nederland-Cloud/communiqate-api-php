<?php

require_once __DIR__ . '/../vendor/autoload.php';

use CommuniQate\ApiClient;
use CommuniQate\Exceptions\ValidationException;

const API_KEY = '';
const ORGANIZATION_ID = '';
const TEMPLATE_MESSAGE_ID = '';
const PHONE_NUMBER = '+31612345678';
const DATE = '2023-05-24T08:46:00Z';

$communiqate = new ApiClient(API_KEY, ORGANIZATION_ID);
try {
    $response = $communiqate->messages()->sendMessage(PHONE_NUMBER, [
        'schedule_date' => DATE,
        'type' => 'TEMPLATE',
        'template' => [
            'template_variant_version_id' => TEMPLATE_MESSAGE_ID,
//            'body_params' => [],
//            'button_param' => [],
//            'header_param' => [],
        ],
        'contact' => [ //Only use for new contacts. Will be ignored for existing contacts.
            'first_name' => 'Frits',
            'last_name' => 'Fictief',
            'country' => 'NL',
            'language' => 'nl',
            'marketing_consent' => 'ALLOWED',
            'email' => 'frits@fictief.nl',
        ]
    ]);

    if ($response->success) {
        var_dump($response->data);
        print "Successfully created message! ID: {$response->data['id']}  \n";
    }
} catch (ValidationException $exception) {
    print $exception->getMessage() . "\n";
    var_dump("Errors:", $exception->getErrors());
}