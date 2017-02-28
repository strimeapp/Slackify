<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\Dnd;
use Strime\Slackify\Exception\InvalidArgumentException;

class DndTest extends AbstractApiTestCase
{
    public function testEndDndRequestShouldReturnApiObject()
    {
        $api = $this->getApiDndMock('api-token');

        $api->expects($this->once())
            ->method('endDnd')
            ->will($this->returnValue($api));

        $api->endDnd();
    }


    public function testEndSnoozeRequestShouldReturnJsonObject()
    {
        $api = $this->getApiDndMock('api-token');

        $api->expects($this->once())
            ->method('endSnooze')
            ->will($this->returnValue("string"));

        $api->endSnooze();
    }

    public function testInfoWithWrongParametersReturnsException()
    {
        $api = $this->getApiDndMock('api-token');

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
        $api = $this->getApiDndMock('api-token');

        $api->expects($this->once())
            ->method('info')
            ->with("U12345")
            ->will($this->returnValue("string"));

        $api->info("U12345");
    }

    public function testSetSnoozeWithWrongParametersReturnsException()
    {
        $api = $this->getApiDndMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('setSnooze')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->setSnooze(array());
    }

    public function testSetSnoozeRequestShouldReturnJsonObject()
    {
        $api = $this->getApiDndMock('api-token');

        $api->expects($this->once())
            ->method('setSnooze')
            ->with(10)
            ->will($this->returnValue("string"));

        $api->setSnooze(10);
    }

    public function testTeamInfoWithWrongParametersReturnsException()
    {
        $api = $this->getApiDndMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('teamInfo')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->teamInfo(array());
    }

    public function testTeamInfoRequestShouldReturnJsonObject()
    {
        $api = $this->getApiDndMock('api-token');

        $api->expects($this->once())
            ->method('teamInfo')
            ->with("U12345,U67890")
            ->will($this->returnValue("string"));

        $api->teamInfo("U12345,U67890");
    }
}
