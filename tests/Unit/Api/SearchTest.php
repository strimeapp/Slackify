<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\Search;
use Strime\Slackify\Exception\InvalidArgumentException;
use Strime\Slackify\Exception\RuntimeException;

class SearchTest extends AbstractApiTestCase
{
    public function testAllWithWrongParametersReturnsException()
    {
        $api = $this->getApiSearchMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('all')
            ->with(array(), array(), array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->all(array(), array(), array(), array());
    }
    
    public function testAllRequestShouldReturnApiObject()
    {
        $api = $this->getApiSearchMock('api-token');

        $api->expects($this->once())
            ->method('all')
            ->with("foo", "timestamp", "asc", 2, 10, 3)
            ->will($this->returnValue("results"));

        $api->all("foo", "timestamp", "asc", 2, 10, 3);
    }

    public function testFilesWithWrongParametersReturnsException()
    {
        $api = $this->getApiSearchMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('files')
            ->with(array(), array(), array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->files(array(), array(), array(), array());
    }
    
    public function testFilesRequestShouldReturnApiObject()
    {
        $api = $this->getApiSearchMock('api-token');

        $api->expects($this->once())
            ->method('files')
            ->with("foo", "timestamp", "asc", 2, 10, 3)
            ->will($this->returnValue("results"));

        $api->files("foo", "timestamp", "asc", 2, 10, 3);
    }

    public function testMessagesWithWrongParametersReturnsException()
    {
        $api = $this->getApiSearchMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('messages')
            ->with(array(), array(), array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->messages(array(), array(), array(), array());
    }
    
    public function testMessagesRequestShouldReturnApiObject()
    {
        $api = $this->getApiSearchMock('api-token');

        $api->expects($this->once())
            ->method('messages')
            ->with("foo", "timestamp", "asc", 2, 10, 3)
            ->will($this->returnValue("results"));

        $api->messages("foo", "timestamp", "asc", 2, 10, 3);
    }
}
