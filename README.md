# CommuniQate API Library for PHP

___

This is the PHP api library for CommuniQate.

This library can be used to:

* Check, enable and disable the autopilot.
* Create, update and delete planned messages.
* Get, set and un-set contact attributes.
* Update the unsubscribe value on the contact (opt-out from all messages).
* Assign or de-assign an operator to the conversation.
* Get, set and un-set contact attributes.
* Get, and update contact information.

Examples can be found in the <code>[examples/](/communiqate-api-php/tree/main/examples)</code> directory or in
the [Examples](#examples) section below.

### Installation

___
You can use composer to install the library, this is the preferred method of installation.

Execute the following command in your projects root directory:

<code>composer require acn-cloud/communiqate-api-php</code>

### Examples

___
See the <code>[examples/](/communiqate-api-php/tree/main/examples)</code> directory for examples of the features listed
above.

### Basic Example

```php
<?php


const API_KEY = '';
const ORGANIZATION_ID = '';
const TEMPLATE_MESSAGE_ID = '';
const PHONE_NUMBER = '+31612345678'; //contacts phone number (E.164 format)

$communiqate = new \CommuniQate\ApiClient(API_KEY, ORGANIZATION_ID);

try {
$response = $communiqate->messages()->sendMessage(PHONE_NUMBER, [
        'type' => 'TEMPLATE',
        'template' => [
            'template_variant_version_id' => TEMPLATE_MESSAGE_ID,
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

} catch (\CommuniQate\Exceptions\ApiException $apiException) {
        print "Send message request failed \n";
        var_dump(["response" => $apiException->getResponseObject()]);
}
```
