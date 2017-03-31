<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\UserGroups;
use Strime\Slackify\Exception\InvalidArgumentException;
use Strime\Slackify\Exception\RuntimeException;

class UsersTest extends AbstractApiTestCase
{
    public function testDeletePhotoRequestShouldReturnApiObject()
    {
        $api = $this->getApiUsersMock('api-token');

        $api->expects($this->once())
            ->method('deletePhoto')
            ->will($this->returnValue($api));

        $api->deletePhoto();
    }

    public function testGetPresenceWithWrongParametersReturnsException()
    {
        $api = $this->getApiUsersMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('getPresence')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->getPresence(array());
    }

    public function testGetPresenceRequestShouldReturnJsonObject()
    {
        $api = $this->getApiUsersMock('api-token');

        $api->expects($this->once())
            ->method('getPresence')
            ->with("U12345")
            ->will($this->returnValue("json"));

        $api->getPresence("U12345");
    }

    public function testIdentityRequestShouldReturnJsonObject()
    {
        $api = $this->getApiUsersMock('api-token');

        $api->expects($this->once())
            ->method('identity')
            ->will($this->returnValue("json"));

        $api->identity();
    }

    public function testInfoWithWrongParametersReturnsException()
    {
        $api = $this->getApiUsersMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('info')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->info(array());
    }

    public function testInfoRequestShouldReturnJsonObject()
    {
        $api = $this->getApiUsersMock('api-token');

        $api->expects($this->once())
            ->method('info')
            ->with("U12345")
            ->will($this->returnValue("json"));

        $api->info("U12345");
    }

    public function testListWithWrongParametersReturnsException()
    {
        $api = $this->getApiUsersMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('list_users')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->list_users(array());
    }

    public function testListRequestShouldReturnJsonObject()
    {
        $api = $this->getApiUsersMock('api-token');

        $api->expects($this->once())
            ->method('list_users')
            ->with("foo")
            ->will($this->returnValue("json"));

        $api->list_users("foo");
    }

    public function testSetActiveRequestShouldReturnApiObject()
    {
        $api = $this->getApiUsersMock('api-token');

        $api->expects($this->once())
            ->method('setActive')
            ->will($this->returnValue($api));

        $api->setActive();
    }

    public function testSetPhotoWithWrongParametersReturnsException()
    {
        $api = $this->getApiUsersMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('setPhoto')
            ->with(array(), array(), array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->setPhoto(array(), array(), array(), array());
    }

    public function testSetPhotoRequestShouldReturnApiObject()
    {
        $api = $this->getApiUsersMock('api-token');

        $api->expects($this->once())
            ->method('setPhoto')
            ->with(__FILE__, 1, 2, 3)
            ->will($this->returnValue($api));

        $api->setPhoto(__FILE__, 1, 2, 3);
    }

    public function testSetPresenceWithWrongParametersReturnsException()
    {
        $api = $this->getApiUsersMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('setPresence')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->setPresence(array());
    }

    public function testSetPresenceRequestShouldReturnApiObject()
    {
        $api = $this->getApiUsersMock('api-token');

        $api->expects($this->once())
            ->method('setPresence')
            ->with("foo")
            ->will($this->returnValue($api));

        $api->setPresence("foo");
    }
}
