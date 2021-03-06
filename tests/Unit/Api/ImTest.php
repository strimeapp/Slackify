<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\Im;
use Strime\Slackify\Exception\InvalidArgumentException;
use Strime\Slackify\Exception\RuntimeException;

class ImTest extends AbstractApiTestCase
{
    public function testCloseWithWrongParametersReturnsException()
    {
        $api = $this->getApiImMock('api-token');

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
        $api = $this->getApiImMock('api-token');

        $api->expects($this->once())
            ->method('close')
            ->with("D12345")
            ->will($this->returnValue($api));

        $api->close("D12345");
    }

    public function testHistoryWithWrongParametersReturnsException()
    {
        $api = $this->getApiImMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('history')
            ->with(array(), array(), array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->history(array(), array(), array(), array());
    }

    public function testHistoryRequestShouldReturnJsonObject()
    {
        $api = $this->getApiImMock('api-token');

        $api->expects($this->once())
            ->method('history')
            ->with("G12345", (string)time(), (string)strtotime('yesterday'))
            ->will($this->returnValue("string"));

        $api->history("G12345", (string)time(), (string)strtotime('yesterday'));
    }

    public function testListRequestShouldReturnJsonObject()
    {
        $api = $this->getApiImMock('api-token');

        $api->expects($this->once())
            ->method('list_im')
            ->will($this->returnValue("string"));

        $api->list_im();
    }

    public function testMarkWithWrongParametersReturnsException()
    {
        $api = $this->getApiImMock('api-token');

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
        $api = $this->getApiImMock('api-token');

        $api->expects($this->once())
            ->method('mark')
            ->with("G12345", time())
            ->will($this->returnValue($api));

        $api->mark("G12345", time());
    }

    public function testOpenWithWrongParametersReturnsException()
    {
        $api = $this->getApiImMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('open')
            ->with(array(), "foo")
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->open(array(), "foo");
    }

    public function testOpenRequestShouldReturnJsonObject()
    {
        $api = $this->getApiImMock('api-token');

        $api->expects($this->once())
            ->method('open')
            ->with("U12345", FALSE)
            ->will($this->returnValue("string"));

        $api->open("U12345", FALSE);
    }

    public function testRepliesWithWrongParametersReturnsException()
    {
        $api = $this->getApiImMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('replies')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->replies(array(), array());
    }

    public function testRepliesRequestShouldReturnJsonObject()
    {
        $api = $this->getApiImMock('api-token');

        $api->expects($this->once())
            ->method('replies')
            ->with("C12345", time())
            ->will($this->returnValue("string"));

        $api->replies("C12345", time());
    }
}
