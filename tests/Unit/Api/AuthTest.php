<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\Auth;
use Strime\Slackify\Exception\InvalidArgumentException;

class AuthTest extends AbstractApiTestCase
{
    public function testRevokeWithWrongParametersReturnsException()
    {
        $api = $this->getApiAuthMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('revoke')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->revoke(array());
    }

    public function testRevokeRequestShouldReturnApiObject()
    {
        $api = $this->getApiAuthMock('api-token');

        $api->expects($this->once())
            ->method('revoke')
            ->with("foo", TRUE)
            ->will($this->returnValue($api));

        $api->revoke("foo", TRUE);
    }

    public function testTestRequestShouldReturnJsonObject()
    {
        $api = $this->getApiAuthMock('api-token');

        $api->expects($this->once())
            ->method('test')
            ->will($this->returnValue("string"));

        $api->test();
    }
}
