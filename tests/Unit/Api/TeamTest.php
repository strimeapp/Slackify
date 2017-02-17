<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\Team;
use Strime\Slackify\Exception\InvalidArgumentException;
use Strime\Slackify\Exception\RuntimeException;

class TeamTest extends AbstractApiTestCase
{
    public function testAccessLogsWithWrongParametersReturnsException()
    {
        $api = $this->getApiTeamMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('accessLogs')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->accessLogs(array(), array());
    }

    public function testAccessLogsRequestShouldReturnJsonObject()
    {
        $api = $this->getApiTeamMock('api-token');

        $api->expects($this->once())
            ->method('accessLogs')
            ->with(18, 3, (string)time())
            ->will($this->returnValue("json"));

        $api->accessLogs(18, 3, (string)time());
    }

    public function testBillableInfoWithWrongParametersReturnsException()
    {
        $api = $this->getApiTeamMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('billableInfo')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->billableInfo(array());
    }

    public function testBillableInfoRequestShouldReturnJsonObject()
    {
        $api = $this->getApiTeamMock('api-token');

        $api->expects($this->once())
            ->method('billableInfo')
            ->with("U12345")
            ->will($this->returnValue("json"));

        $api->billableInfo("U12345");
    }

    public function testInfoRequestShouldReturnJsonObject()
    {
        $api = $this->getApiTeamMock('api-token');

        $api->expects($this->once())
            ->method('info')
            ->will($this->returnValue("json"));

        $api->info();
    }

    public function testIntegrationLogsWithWrongParametersReturnsException()
    {
        $api = $this->getApiTeamMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('integrationLogs')
            ->with(array(), array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->integrationLogs(array(), array(), array());
    }

    public function testIntegrationLogsRequestShouldReturnJsonObject()
    {
        $api = $this->getApiTeamMock('api-token');

        $api->expects($this->once())
            ->method('integrationLogs')
            ->with("foo", "bar", "U12345", "foo", 19, 5)
            ->will($this->returnValue("json"));

        $api->integrationLogs("foo", "bar", "U12345", "foo", 19, 5);
    }

    public function testProfileGetWithWrongParametersReturnsException()
    {
        $api = $this->getApiTeamMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('profileGet')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->profileGet(array());
    }

    public function testProfileGetWithWrongValueReturnsException()
    {
        $api = $this->getApiTeamMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('profileGet')
            ->with("foo")
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->profileGet("foo");
    }

    public function testProfileGetRequestShouldReturnJsonObject()
    {
        $api = $this->getApiTeamMock('api-token');

        $api->expects($this->once())
            ->method('profileGet')
            ->with("all")
            ->will($this->returnValue("json"));

        $api->profileGet("all");
    }
}
