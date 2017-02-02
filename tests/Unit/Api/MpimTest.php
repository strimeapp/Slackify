<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\Mpim;
use Strime\Slackify\Exception\InvalidArgumentException;
use Strime\Slackify\Exception\RuntimeException;

class MpimTest extends AbstractApiTestCase
{
    public function testCloseWithWrongParametersReturnsException()
    {
        $api = $this->getApiMpimMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('close')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->close(array());
    }
    
    public function testCloseRequestShouldReturnApiObject()
    {
        $api = $this->getApiMpimMock('api-token');

        $api->expects($this->once())
            ->method('close')
            ->with("D12345")
            ->will($this->returnValue($api));

        $api->close("D12345");
    }

    public function testHistoryWithWrongParametersReturnsException()
    {
        $api = $this->getApiMpimMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('history')
            ->with(array(), array(), array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->history(array(), array(), array(), array());
    }
    
    public function testHistoryRequestShouldReturnApiObject()
    {
        $api = $this->getApiMpimMock('api-token');

        $api->expects($this->once())
            ->method('history')
            ->with("G12345", (string)time(), (string)strtotime('yesterday'))
            ->will($this->returnValue($api));

        $api->history("G12345", (string)time(), (string)strtotime('yesterday'));
    }
    
    public function testListRequestShouldReturnApiObject()
    {
        $api = $this->getApiMpimMock('api-token');

        $api->expects($this->once())
            ->method('list')
            ->will($this->returnValue($api));

        $api->list();
    }

    public function testMarkWithWrongParametersReturnsException()
    {
        $api = $this->getApiMpimMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('mark')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->mark(array(), array());
    }
    
    public function testMarkRequestShouldReturnApiObject()
    {
        $api = $this->getApiMpimMock('api-token');

        $api->expects($this->once())
            ->method('mark')
            ->with("G12345", (string)time())
            ->will($this->returnValue($api));

        $api->mark("G12345", (string)time());
    }

    public function testOpenWithWrongParametersReturnsException()
    {
        $api = $this->getApiMpimMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('open')
            ->with(array(), "foo")
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->open(array(), "foo");
    }
    
    public function testOpenRequestShouldReturnApiObject()
    {
        $api = $this->getApiMpimMock('api-token');

        $api->expects($this->once())
            ->method('open')
            ->with("U12345,U67890", FALSE)
            ->will($this->returnValue($api));

        $api->open("U12345,U67890", FALSE);
    }

    public function testRepliesWithWrongParametersReturnsException()
    {
        $api = $this->getApiMpimMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('replies')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->replies(array(), array());
    }
    
    public function testRepliesRequestShouldReturnApiObject()
    {
        $api = $this->getApiMpimMock('api-token');

        $api->expects($this->once())
            ->method('replies')
            ->with("C12345", (string)time())
            ->will($this->returnValue($api));

        $api->replies("C12345", (string)time());
    }
}
