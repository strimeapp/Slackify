<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\Reactions;
use Strime\Slackify\Exception\InvalidArgumentException;
use Strime\Slackify\Exception\RuntimeException;

class ReactionsTest extends AbstractApiTestCase
{
    public function testAddWithWrongParametersReturnsException()
    {
        $api = $this->getApiReactionsMock('api-token');

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
        $api = $this->getApiReactionsMock('api-token');

        $api->expects($this->once())
            ->method('add')
            ->with("F12345", "Fc12345", "C12345")
            ->will($this->returnValue($api));

        $api->add("F12345", "Fc12345", "C12345");
    }

    public function testGetWithWrongParametersReturnsException()
    {
        $api = $this->getApiReactionsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('get')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->get(array(), array());
    }
    
    public function testGetRequestShouldReturnApiObject()
    {
        $api = $this->getApiReactionsMock('api-token');

        $api->expects($this->once())
            ->method('get')
            ->with("F12345", "Fc12345", "C12345")
            ->will($this->returnValue($api));

        $api->get("F12345", "Fc12345", "C12345");
    }

    public function testListWithWrongParametersReturnsException()
    {
        $api = $this->getApiReactionsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('list')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->list(array(), array());
    }
    
    public function testListRequestShouldReturnApiObject()
    {
        $api = $this->getApiReactionsMock('api-token');

        $api->expects($this->once())
            ->method('list')
            ->with("U12345", TRUE)
            ->will($this->returnValue($api));

        $api->list("U12345", TRUE);
    }

    public function testRemoveWithWrongParametersReturnsException()
    {
        $api = $this->getApiReactionsMock('api-token');

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
        $api = $this->getApiReactionsMock('api-token');

        $api->expects($this->once())
            ->method('remove')
            ->with("F12345", "Fc12345", "C12345")
            ->will($this->returnValue($api));

        $api->remove("F12345", "Fc12345", "C12345");
    }
}
