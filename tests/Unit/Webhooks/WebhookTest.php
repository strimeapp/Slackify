<?php

namespace Tests\Strime\Slackify\Unit\Webhooks;

use Strime\Slackify\Webhooks\Webhook;
use Strime\Slackify\Exception\InvalidArgumentException;

class WebhookTest extends AbstractWebhookTestCase
{
    public function testGetUrlReturnsUrl()
    {
        $webhook = $this->getWebhookMock('http://www.foo.bar');
        $this->assertContains('http', $webhook->getUrl());
    }

    public function testMissingParametersReturnException()
    {
        $webhook = $this->getWebhookMock('http://www.foo.bar');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $webhook->expects($this->once())
            ->method('sendMessage')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $webhook->sendMessage(array());
    }
    
    /**
     * @dataProvider provideValues
     */
    public function testSendMessageShouldSendMessage($message, $username, $link, $link_text, $icon)
    {
        $webhook = $this->getWebhookMock('http://www.foo.bar');

        $webhook->expects($this->once())
            ->method('sendMessage')
            ->with(array("message" => $message, "username" => $username, "link" => $link, "link_text" => $link_text, "icon" => $icon));

        $webhook->sendMessage(array("message" => $message, "username" => $username, "link" => $link, "link_text" => $link_text, "icon" => $icon));
    }
    
    /**
     * @dataProvider provideValuesWithAttachments
     */
    public function testSendMessageShouldSendMessageWithAttachments($message, $username, $link, $link_text, $icon, $fields)
    {
        $webhook = $this->getWebhookMock('http://www.foo.bar');

        $webhook->expects($this->once())
            ->method('sendMessage')
            ->with(array("message" => $message, "username" => $username, "link" => $link, "link_text" => $link_text, "icon" => $icon, "fields" => $fields));

        $webhook->sendMessage(array("message" => $message, "username" => $username, "link" => $link, "link_text" => $link_text, "icon" => $icon, "fields" => $fields));
    }

    public function provideValues()
    {
        return array(
            array("Foo bar", NULL, NULL, NULL, NULL),
            array("Foo bar", "Bobby", NULL, NULL, ":taco:"),
            array("Foo bar", "Bobby", "https://www.strime.io", NULL, ":taco:"),
            array("Foo bar", "Bobby", "https://www.strime.io", "Strime", ":taco:"),
            array("Foo bar", "Bobby", "https://www.strime.io", "Strime", NULL),
        );
    }

    public function provideValuesWithAttachments()
    {
        return array(
            array("Foo bar", NULL, NULL, NULL, NULL, array()),
            array("Foo bar", "Bobby", NULL, NULL, ":taco:", array("title" => "Test")),
            array("Foo bar", "Bobby", "https://www.strime.io", NULL, ":taco:", array("title" => "Test", "value" => "A value")),
            array("Foo bar", "Bobby", "https://www.strime.io", "Strime", ":taco:", array("title" => "Test", "value" => "A value", "short" => TRUE)),
            array("Foo bar", "Bobby", "https://www.strime.io", "Strime", NULL, array()),
        );
    }
}
