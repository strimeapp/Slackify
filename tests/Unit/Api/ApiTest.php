<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\Api;
use Strime\Slackify\Exception\InvalidArgumentException;

class ApiTest extends AbstractApiTestCase
{
    public function testWrongParametersReturnsException()
    {
        $api = $this->getApiMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('test')
            ->with(array("foo" => "bar"))
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->test(array("foo" => "bar"));
    }
    
    public function testTestRequestShouldReturnApiObject()
    {
        $api = $this->getApiMock('api-token');

        $api->expects($this->once())
            ->method('test')
            ->will($this->returnValue($api));
            
        $result = $api->test();
        $this->assertInstanceOf('Strime\Slackify\Api\Api', $result);
    }
}
