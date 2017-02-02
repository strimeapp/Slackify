<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\Rtm;
use Strime\Slackify\Exception\InvalidArgumentException;
use Strime\Slackify\Exception\RuntimeException;

class RtmTest extends AbstractApiTestCase
{
    public function testStartWithWrongParametersReturnsException()
    {
        $api = $this->getApiRtmMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('start')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->start(array(), array());
    }
    
    public function testStartRequestShouldReturnApiObject()
    {
        $api = $this->getApiRtmMock('api-token');

        $api->expects($this->once())
            ->method('start')
            ->with(TRUE, FALSE, TRUE)
            ->will($this->returnValue("json"));

        $api->start(TRUE, FALSE, TRUE);
    }
}
