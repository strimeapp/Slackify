<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\Bots;
use Strime\Slackify\Exception\InvalidArgumentException;

class BotsTest extends AbstractApiTestCase
{
    public function testInfoWithWrongParametersReturnsException()
    {
        $api = $this->getApiBotsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('info')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->info(array());
    }
    
    public function testInfoRequestShouldReturnApiObject()
    {
        $api = $this->getApiBotsMock('api-token');

        $api->expects($this->once())
            ->method('info')
            ->with("bot-name")
            ->will($this->returnValue($api));

        $api->info("bot-name");
    }
}
