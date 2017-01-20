<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\Auth;
use Strime\Slackify\Exception\InvalidArgumentException;

class AuthTest extends AbstractApiTestCase
{
    public function testWrongParametersReturnException()
    {
        $api = $this->getApiAuthMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('revoke')
            ->with(1, "foo")
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->revoke(1, "foo");
    }
    
    public function testTestRequestShouldReturnApiObject()
    {
        $api = $this->getApiAuthMock('api-token');

        $api->expects($this->once())
            ->method('revoke')
            ->with('dummy-token')
            ->will($this->returnValue($api));

        $api->revoke('dummy-token');
    }
}
