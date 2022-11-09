<?php

require_once __DIR__ . '/../vendor/autoload.php';

use CommuniQate\ApiClient;
use CommuniQate\Exceptions\ValidationException;

const API_KEY = '';

$communiqate = new ApiClient(API_KEY);

try {
    $response = $communiqate->conversations()->sendMessage('+31612345678', [
        'scheduled_at' => '2022-11-09 14:21:51.408090 UTC',
        'template_message_id' => 'TEMPLATE_MESSAGE_ID',
        'variables' => [
            'header' => '',
            'body' => [],
            'buttons' => [],
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