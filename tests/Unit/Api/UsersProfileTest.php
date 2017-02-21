<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\UserGroups;
use Strime\Slackify\Exception\InvalidArgumentException;
use Strime\Slackify\Exception\RuntimeException;

class UserGroupsTest extends AbstractApiTestCase
{
    public function testGetWithWrongParametersReturnsException()
    {
        $api = $this->getApiUsersProfileMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('get')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->get(array(), array());
    }

    public function testGetRequestShouldReturnJsonObject()
    {
        $api = $this->getApiUsersProfileMock('api-token');

        $api->expects($this->once())
            ->method('get')
            ->with("U12345", TRUE)
            ->will($this->returnValue("json"));

        $api->get("U12345", TRUE);
    }

    public function testSetWithWrongParametersReturnsException()
    {
        $api = $this->getApiUsersProfileMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('set')
            ->with(array(), array(), array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->set(array(), array(), array(), array());
    }

    public function testSetRequestShouldReturnJsonObject()
    {
        $api = $this->getApiUsersProfileMock('api-token');

        $api->expects($this->once())
            ->method('set')
            ->with("U12345", "foo")
            ->will($this->returnValue("json"));

        $api->set("U12345", "foo");
    }
}
