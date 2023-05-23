<?php

namespace CommuniQate\Traits;

use CommuniQate\Resources\ContactAttributes;
use CommuniQate\Resources\Contacts;
use CommuniQate\Resources\Conversations;
use CommuniQate\Resources\Messages;

trait HandlesResources
{
    /**
     * Contact attributes resource
     * @return ContactAttributes
     */
    public function contactAttributes(): ContactAttributes
    {
        return new ContactAttributes($this->getHttpClient());
    }

    /**
     * Contacts resource
     * @return Contacts
     */
    public function contacts(): Contacts
    {
        return new Contacts($this->getHttpClient());
    }

    /**
     * Conversations resource
     * @return Conversations
     */
    public function conversations(): Conversations
    {
        return new Conversations($this->getHttpClient());
    }

    /**
     * Messages resource
     * @return Messages
     */
    public function messages(): Messages
    {
        return new Messages($this->getHttpClient());
    }

}