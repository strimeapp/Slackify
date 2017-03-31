<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\Im;
use Strime\Slackify\Exception\InvalidArgumentException;
use Strime\Slackify\Exception\RuntimeException;

class PinTest extends AbstractApiTestCase
{
    public function testAddWithWrongParametersReturnsException()
    {
        $api = $this->getApiPinMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('add')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->add(array(), array());
    }

    public function testAddRequestShouldReturnApiObject()
    {
        $api = $this->getApiPinMock('api-token');

        $api->expects($this->once())
            ->method('add')
            ->with("C12345", "F12345", "Fc12345")
            ->will($this->returnValue($api));

        $api->add("C12345", "F12345", "Fc12345");
    }

    public function testListWithWrongParametersReturnsException()
    {
        $api = $this->getApiPinMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('list_pin')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->list_pin(array());
    }

    public function testListRequestShouldReturnJsonObject()
    {
        $api = $this->getApiPinMock('api-token');

        $api->expects($this->once())
            ->method('list_pin')
            ->with("C12345")
            ->will($this->returnValue("string"));

        $api->list_pin("C12345");
    }

    public function testRemoveWithWrongParametersReturnsException()
    {
        $api = $this->getApiPinMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('remove')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->remove(array(), array());
    }

    public function testRemoveRequestShouldReturnApiObject()
    {
        $api = $this->getApiPinMock('api-token');

        $api->expects($this->once())
            ->method('remove')
            ->with("C12345", "F12345", "Fc12345")
            ->will($this->returnValue($api));

        $api->remove("C12345", "F12345", "Fc12345");
    }
}
