<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\Oauth;
use Strime\Slackify\Exception\InvalidArgumentException;
use Strime\Slackify\Exception\RuntimeException;

class OauthTest extends AbstractApiTestCase
{
    public function testAccessWithWrongParametersReturnsException()
    {
        $api = $this->getApiOauthMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('access')
            ->with(array(), array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->access(array(), array(), array());
    }
    
    public function testAccessRequestShouldReturnApiObject()
    {
        $api = $this->getApiOauthMock('api-token');

        $api->expects($this->once())
            ->method('access')
            ->with("foo", "bar", "test")
            ->will($this->returnValue("response"));

        $api->access("foo", "bar", "test");
    }
}
