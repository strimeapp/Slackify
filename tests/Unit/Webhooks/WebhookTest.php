<?php

namespace Tests\Strime\Slackify\Unit\Webhooks;

use Strime\Slackify\Webhooks\Webhook;

class WebhookTest extends AbstractWebhookTestCase
{
    public function testGetUrlReturnsUrl()
    {
        $webhook = $this->getWebhookMock();
        $webhook->setUrl('http://www.foo.bar');
        var_dump($webhook->getUrl());
        $this->assertStringMatchesFormat('https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)', $webhook->getUrl());
    }
}
