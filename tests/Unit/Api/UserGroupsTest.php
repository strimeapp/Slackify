<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\UserGroups;
use Strime\Slackify\Exception\InvalidArgumentException;
use Strime\Slackify\Exception\RuntimeException;

class UserGroupsTest extends AbstractApiTestCase
{
    public function testCreateWithWrongParametersReturnsException()
    {
        $api = $this->getApiUserGroupsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('create')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->create(array(), array());
    }

    public function testCreateRequestShouldReturnJsonObject()
    {
        $api = $this->getApiUserGroupsMock('api-token');

        $api->expects($this->once())
            ->method('create')
            ->with("foo", "bar", "pouet", "C12345,C67890", FALSE)
            ->will($this->returnValue("json"));

        $api->create("foo", "bar", "pouet", "C12345,C67890", FALSE);
    }

    public function testDisableWithWrongParametersReturnsException()
    {
        $api = $this->getApiUserGroupsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('disable')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->disable(array());
    }

    public function testDisableRequestShouldReturnJsonObject()
    {
        $api = $this->getApiUserGroupsMock('api-token');

        $api->expects($this->once())
            ->method('disable')
            ->with("Ug12345", TRUE)
            ->will($this->returnValue("json"));

        $api->disable("Ug12345", TRUE);
    }

    public function testEnableWithWrongParametersReturnsException()
    {
        $api = $this->getApiUserGroupsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('enable')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->enable(array());
    }

    public function testEnableRequestShouldReturnJsonObject()
    {
        $api = $this->getApiUserGroupsMock('api-token');

        $api->expects($this->once())
            ->method('enable')
            ->with("Ug12345", TRUE)
            ->will($this->returnValue("json"));

        $api->enable("Ug12345", TRUE);
    }

    public function testListWithWrongParametersReturnsException()
    {
        $api = $this->getApiUserGroupsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('list')
            ->with(array(), array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->list(array(), array(), array());
    }

    public function testListRequestShouldReturnJsonObject()
    {
        $api = $this->getApiUserGroupsMock('api-token');

        $api->expects($this->once())
            ->method('list')
            ->with(TRUE, FALSE, TRUE)
            ->will($this->returnValue("json"));

        $api->list(TRUE, FALSE, TRUE);
    }

    public function testUpdateWithWrongParametersReturnsException()
    {
        $api = $this->getApiUserGroupsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('update')
            ->with(array(), array(), array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->update(array(), array(), array(), array());
    }

    public function testUpdateRequestShouldReturnJsonObject()
    {
        $api = $this->getApiUserGroupsMock('api-token');

        $api->expects($this->once())
            ->method('update')
            ->with("Ug12345", "foo", "bar", NULL, NULL, TRUE)
            ->will($this->returnValue("json"));

        $api->update("Ug12345", "foo", "bar", NULL, NULL, TRUE);
    }
}
