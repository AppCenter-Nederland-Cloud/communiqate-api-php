<?php

namespace CommuniQate\Traits;

use CommuniQate\Resources\Contacts;
use CommuniQate\Resources\Conversations;

trait HandlesResources
{
    /**
     * Conversations resource
     * @return Conversations
     */
    public function conversations(): Conversations
    {
        return new Conversations($this->getHttpClient());
    }

    /**
     * Contacts resource
     * @return Contacts
     */
    public function contacts(): Contacts
    {
        return new Contacts($this->getHttpClient());
    }

}