<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\Reminders;
use Strime\Slackify\Exception\InvalidArgumentException;
use Strime\Slackify\Exception\RuntimeException;

class RemindersTest extends AbstractApiTestCase
{
    public function testAddWithWrongParametersReturnsException()
    {
        $api = $this->getApiRemindersMock('api-token');

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
        $api = $this->getApiRemindersMock('api-token');

        $api->expects($this->once())
            ->method('add')
            ->with("Foo", (string)time(), "U12345")
            ->will($this->returnValue($api));

        $api->add("Foo", (string)time(), "U12345");
    }

    public function testCompleteWithWrongParametersReturnsException()
    {
        $api = $this->getApiRemindersMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('complete')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->complete(array());
    }
    
    public function testCompleteRequestShouldReturnApiObject()
    {
        $api = $this->getApiRemindersMock('api-token');

        $api->expects($this->once())
            ->method('complete')
            ->with("Rm12345")
            ->will($this->returnValue($api));

        $api->complete("Rm12345");
    }

    public function testDeleteWithWrongParametersReturnsException()
    {
        $api = $this->getApiRemindersMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('delete')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->delete(array());
    }
    
    public function testDeleteRequestShouldReturnApiObject()
    {
        $api = $this->getApiRemindersMock('api-token');

        $api->expects($this->once())
            ->method('delete')
            ->with("Rm12345")
            ->will($this->returnValue($api));

        $api->delete("Rm12345");
    }

    public function testInfoWithWrongParametersReturnsException()
    {
        $api = $this->getApiRemindersMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('info')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->info(array());
    }
    
    public function testInfoRequestShouldReturnString()
    {
        $api = $this->getApiRemindersMock('api-token');

        $api->expects($this->once())
            ->method('info')
            ->with("Rm12345")
            ->will($this->returnValue("reminder"));

        $api->info("Rm12345");
    }
    
    public function testListRequestShouldReturnString()
    {
        $api = $this->getApiRemindersMock('api-token');

        $api->expects($this->once())
            ->method('list')
            ->with()
            ->will($this->returnValue("reminders"));

        $api->list();
    }
}
