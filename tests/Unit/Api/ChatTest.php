<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\Bots;
use Strime\Slackify\Exception\InvalidArgumentException;

class ChatTest extends AbstractApiTestCase
{
    public function testDeleteWithWrongParametersReturnsException()
    {
        $api = $this->getApiChatMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('delete')
            ->with(array(), array(), "foo")
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->delete(array(), array(), "foo");
    }

    public function testDeleteRequestShouldReturnJsonObject()
    {
        $api = $this->getApiChatMock('api-token');

        $api->expects($this->once())
            ->method('delete')
            ->with(time(), "C12345")
            ->will($this->returnValue("string"));

        $api->delete(time(), "C12345");
    }

    public function testMeMessageWithWrongParametersReturnsException()
    {
        $api = $this->getApiChatMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('meMessage')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->meMessage(array(), array());
    }

    public function testMeMessageRequestShouldReturnJsonObject()
    {
        $api = $this->getApiChatMock('api-token');

        $api->expects($this->once())
            ->method('meMessage')
            ->with("C12345", "foo bar")
            ->will($this->returnValue("string"));

        $api->meMessage("C12345", "foo bar");
    }

    public function testPostMessageWithWrongParametersReturnsException()
    {
        $api = $this->getApiChatMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('postMessage')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->postMessage(array(), array());
    }

    public function testPostMessageRequestShouldReturnJsonObject()
    {
        $api = $this->getApiChatMock('api-token');

        $api->expects($this->once())
            ->method('postMessage')
            ->with("C12345", "foo bar", "full", 0)
            ->will($this->returnValue("string"));

        $api->postMessage("C12345", "foo bar", "full", 0);
    }

    public function testUpdateWithWrongParametersReturnsException()
    {
        $api = $this->getApiChatMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('update')
            ->with(array(), array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->update(array(), array(), array());
    }

    public function testUpdateRequestShouldReturnJsonObject()
    {
        $api = $this->getApiChatMock('api-token');

        $api->expects($this->once())
            ->method('update')
            ->with((string)time(), "C12345", "foo bar")
            ->will($this->returnValue("string"));

        $api->update((string)time(), "C12345", "foo bar");
    }
}
