<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\Files;
use Strime\Slackify\Exception\InvalidArgumentException;
use Strime\Slackify\Exception\RuntimeException;

class GroupsTest extends AbstractApiTestCase
{
    public function testArchiveWithWrongParametersReturnsException()
    {
        $api = $this->getApiGroupsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('archive')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->archive(array());
    }

    public function testArchiveRequestShouldReturnApiObject()
    {
        $api = $this->getApiGroupsMock('api-token');

        $api->expects($this->once())
            ->method('archive')
            ->with("G12345")
            ->will($this->returnValue($api));

        $api->archive("G12345");
    }

    public function testCloseWithWrongParametersReturnsException()
    {
        $api = $this->getApiGroupsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('close')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->close(array());
    }

    public function testCloseRequestShouldReturnJsonObject()
    {
        $api = $this->getApiGroupsMock('api-token');

        $api->expects($this->once())
            ->method('close')
            ->with("G12345")
            ->will($this->returnValue("string"));

        $api->close("G12345");
    }

    public function testCreateWithWrongParametersReturnsException()
    {
        $api = $this->getApiGroupsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('create')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->create(array());
    }

    public function testCreateRequestShouldReturnJsonObject()
    {
        $api = $this->getApiGroupsMock('api-token');

        $api->expects($this->once())
            ->method('create')
            ->with("Foo")
            ->will($this->returnValue("string"));

        $api->create("Foo");
    }

    public function testCreateChildWithWrongParametersReturnsException()
    {
        $api = $this->getApiGroupsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('createChild')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->createChild(array());
    }

    public function testCreateChildRequestShouldReturnJsonObject()
    {
        $api = $this->getApiGroupsMock('api-token');

        $api->expects($this->once())
            ->method('createChild')
            ->with("G12345")
            ->will($this->returnValue("string"));

        $api->createChild("G12345");
    }

    public function testHistoryWithWrongParametersReturnsException()
    {
        $api = $this->getApiGroupsMock('api-token');

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
        $api = $this->getApiGroupsMock('api-token');

        $api->expects($this->once())
            ->method('history')
            ->with("G12345", (string)time(), (string)strtotime('yesterday'))
            ->will($this->returnValue($api));

        $api->history("G12345", (string)time(), (string)strtotime('yesterday'));
    }

    public function testInfoWithWrongParametersReturnsException()
    {
        $api = $this->getApiGroupsMock('api-token');

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
        $api = $this->getApiGroupsMock('api-token');

        $api->expects($this->once())
            ->method('info')
            ->with("G12345")
            ->will($this->returnValue("string"));

        $api->info("G12345");
    }

    public function testInviteWithWrongParametersReturnsException()
    {
        $api = $this->getApiGroupsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('invite')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->invite(array(), array());
    }

    public function testInviteRequestShouldReturnJsonObject()
    {
        $api = $this->getApiGroupsMock('api-token');

        $api->expects($this->once())
            ->method('invite')
            ->with("G12345", "U12345")
            ->will($this->returnValue($api));

        $api->invite("G12345", "U12345");
    }

    public function testKickWithWrongParametersReturnsException()
    {
        $api = $this->getApiGroupsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('kick')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->kick(array(), array());
    }

    public function testKickRequestShouldReturnApiObject()
    {
        $api = $this->getApiGroupsMock('api-token');

        $api->expects($this->once())
            ->method('kick')
            ->with("G12345", "U12345")
            ->will($this->returnValue($api));

        $api->kick("G12345", "U12345");
    }

    public function testLeaveWithWrongParametersReturnsException()
    {
        $api = $this->getApiGroupsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('leave')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->leave(array());
    }

    public function testLeaveRequestShouldReturnApiObject()
    {
        $api = $this->getApiGroupsMock('api-token');

        $api->expects($this->once())
            ->method('leave')
            ->with("G12345")
            ->will($this->returnValue($api));

        $api->leave("G12345");
    }

    public function testListWithWrongParametersReturnsException()
    {
        $api = $this->getApiGroupsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('list')
            ->with("foo")
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->list("foo");
    }

    public function testListRequestShouldReturnJsonObject()
    {
        $api = $this->getApiGroupsMock('api-token');

        $api->expects($this->once())
            ->method('list')
            ->with(1)
            ->will($this->returnValue("string"));

        $api->list(1);
    }

    public function testMarkWithWrongParametersReturnsException()
    {
        $api = $this->getApiGroupsMock('api-token');

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
        $api = $this->getApiGroupsMock('api-token');

        $api->expects($this->once())
            ->method('mark')
            ->with("G12345", (string)time())
            ->will($this->returnValue($api));

        $api->mark("G12345", (string)time());
    }

    public function testOpenWithWrongParametersReturnsException()
    {
        $api = $this->getApiGroupsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('open')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->open(array());
    }

    public function testOpenRequestShouldReturnJsonObject()
    {
        $api = $this->getApiGroupsMock('api-token');

        $api->expects($this->once())
            ->method('open')
            ->with("G12345")
            ->will($this->returnValue("string"));

        $api->open("G12345");
    }

    public function testRenameWithWrongParametersReturnsException()
    {
        $api = $this->getApiGroupsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('rename')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->rename(array(), array());
    }

    public function testRenameRequestShouldReturnJsonObject()
    {
        $api = $this->getApiGroupsMock('api-token');

        $api->expects($this->once())
            ->method('rename')
            ->with("G12345", "Foo bar")
            ->will($this->returnValue("string"));

        $api->rename("G12345", "Foo bar");
    }

    public function testRepliesWithWrongParametersReturnsException()
    {
        $api = $this->getApiGroupsMock('api-token');

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
        $api = $this->getApiGroupsMock('api-token');

        $api->expects($this->once())
            ->method('replies')
            ->with("C12345", time())
            ->will($this->returnValue("string"));

        $api->replies("C12345", time());
    }

    public function testSetPurposeWithWrongParametersReturnsException()
    {
        $api = $this->getApiGroupsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('setPurpose')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->setPurpose(array(), array());
    }

    public function testSetPurposeRequestShouldReturnApiObject()
    {
        $api = $this->getApiGroupsMock('api-token');

        $api->expects($this->once())
            ->method('setPurpose')
            ->with("G12345", "Foo bar")
            ->will($this->returnValue($api));

        $api->setPurpose("G12345", "Foo bar");
    }

    public function testSetTopicWithWrongParametersReturnsException()
    {
        $api = $this->getApiGroupsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('setTopic')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->setTopic(array(), array());
    }

    public function testSetTopicRequestShouldReturnApiObject()
    {
        $api = $this->getApiGroupsMock('api-token');

        $api->expects($this->once())
            ->method('setTopic')
            ->with("G12345", "Foo bar")
            ->will($this->returnValue($api));

        $api->setTopic("G12345", "Foo bar");
    }

    public function testUnarchiveWithWrongParametersReturnsException()
    {
        $api = $this->getApiGroupsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('unarchive')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->unarchive(array());
    }

    public function testUnarchiveRequestShouldReturnApiObject()
    {
        $api = $this->getApiGroupsMock('api-token');

        $api->expects($this->once())
            ->method('unarchive')
            ->with("G12345")
            ->will($this->returnValue($api));

        $api->unarchive("G12345");
    }
}
