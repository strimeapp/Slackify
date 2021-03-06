<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\Stars;
use Strime\Slackify\Exception\InvalidArgumentException;
use Strime\Slackify\Exception\RuntimeException;

class StarsTest extends AbstractApiTestCase
{
    public function testAddWithWrongParametersReturnsException()
    {
        $api = $this->getApiStarsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('add')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->add(array(), array());
    }

    public function testAddRequestShouldReturnJsonObject()
    {
        $api = $this->getApiStarsMock('api-token');

        $api->expects($this->once())
            ->method('add')
            ->with("F12345", "Fc12345", "C12345", (string)time())
            ->will($this->returnValue("json"));

        $api->add("F12345", "Fc12345", "C12345", (string)time());
    }

    public function testListWithWrongParametersReturnsException()
    {
        $api = $this->getApiStarsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('list_stars')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->list_stars(array(), array());
    }

    public function testListRequestShouldReturnApiObject()
    {
        $api = $this->getApiStarsMock('api-token');

        $api->expects($this->once())
            ->method('list_stars')
            ->with(14, 3)
            ->will($this->returnValue($api));

        $api->list_stars(14, 3);
    }

    public function testRemoveWithWrongParametersReturnsException()
    {
        $api = $this->getApiStarsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('remove')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->remove(array(), array());
    }

    public function testRemoveRequestShouldReturnJsonObject()
    {
        $api = $this->getApiStarsMock('api-token');

        $api->expects($this->once())
            ->method('remove')
            ->with("F12345", "Fc12345", "C12345", (string)time())
            ->will($this->returnValue("json"));

        $api->remove("F12345", "Fc12345", "C12345", (string)time());
    }
}
