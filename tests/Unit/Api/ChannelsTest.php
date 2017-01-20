<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\Channels;
use Strime\Slackify\Exception\InvalidArgumentException;

class ChannelsTest extends AbstractApiTestCase
{
    public function testArchiveWithWrongParametersReturnsException()
    {
        $api = $this->getApiChannelsMock('api-token');

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
        $api = $this->getApiChannelsMock('api-token');

        $api->expects($this->once())
            ->method('archive')
            ->with("channel-name")
            ->will($this->returnValue($api));

        $api->archive("channel-name");
    }

    public function testCreateWithWrongParametersReturnsException()
    {
        $api = $this->getApiChannelsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('create')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->create(array());
    }
    
    public function testCreateRequestShouldReturnApiObject()
    {
        $api = $this->getApiChannelsMock('api-token');

        $api->expects($this->once())
            ->method('create')
            ->with("channel-name")
            ->will($this->returnValue($api));

        $api->create("channel-name");
    }

    public function testHistoryWithWrongParametersReturnsException()
    {
        $api = $this->getApiChannelsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('history')
            ->with(array(), array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->history(array(), array(), array());
    }
    
    public function testHistoryRequestShouldReturnApiObject()
    {
        $api = $this->getApiChannelsMock('api-token');

        $api->expects($this->once())
            ->method('history')
            ->with("channel-name", "now", 1000, 1)
            ->will($this->returnValue($api));

        $api->history("channel-name", "now", 1000, 1);
    }

    public function testInfoWithWrongParametersReturnsException()
    {
        $api = $this->getApiChannelsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('info')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->info(array());
    }
    
    public function testInfoRequestShouldReturnApiObject()
    {
        $api = $this->getApiChannelsMock('api-token');

        $api->expects($this->once())
            ->method('info')
            ->with("channel-name")
            ->will($this->returnValue($api));

        $api->info("channel-name");
    }

    public function testInviteWithWrongParametersReturnsException()
    {
        $api = $this->getApiChannelsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('invite')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->invite(array(), array());
    }
    
    public function testInviteRequestShouldReturnApiObject()
    {
        $api = $this->getApiChannelsMock('api-token');

        $api->expects($this->once())
            ->method('invite')
            ->with("C123", "U123")
            ->will($this->returnValue($api));

        $api->invite("C123", "U123");
    }

    public function testJoinWithWrongParametersReturnsException()
    {
        $api = $this->getApiChannelsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('join')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->join(array());
    }
    
    public function testJoinRequestShouldReturnApiObject()
    {
        $api = $this->getApiChannelsMock('api-token');

        $api->expects($this->once())
            ->method('join')
            ->with("C123")
            ->will($this->returnValue($api));

        $api->join("C123");
    }

    public function testKickWithWrongParametersReturnsException()
    {
        $api = $this->getApiChannelsMock('api-token');

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
        $api = $this->getApiChannelsMock('api-token');

        $api->expects($this->once())
            ->method('kick')
            ->with("C123", "U123")
            ->will($this->returnValue($api));

        $api->kick("C123", "U123");
    }

    public function testLeaveWithWrongParametersReturnsException()
    {
        $api = $this->getApiChannelsMock('api-token');

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
        $api = $this->getApiChannelsMock('api-token');

        $api->expects($this->once())
            ->method('leave')
            ->with("C123")
            ->will($this->returnValue($api));

        $api->leave("C123");
    }

    public function testListWithWrongParametersReturnsException()
    {
        $api = $this->getApiChannelsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('list')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->list(array());
    }
    
    public function testListRequestShouldReturnApiObject()
    {
        $api = $this->getApiChannelsMock('api-token');

        $api->expects($this->once())
            ->method('list')
            ->with(1)
            ->will($this->returnValue($api));

        $api->list(1);
    }

    public function testMarkWithWrongParametersReturnsException()
    {
        $api = $this->getApiChannelsMock('api-token');

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
        $api = $this->getApiChannelsMock('api-token');

        $api->expects($this->once())
            ->method('mark')
            ->with("C123", 1)
            ->will($this->returnValue($api));

        $api->mark("C123", 1);
    }

    public function testRenameWithWrongParametersReturnsException()
    {
        $api = $this->getApiChannelsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('rename')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->rename(array(), array());
    }
    
    public function testRenameRequestShouldReturnApiObject()
    {
        $api = $this->getApiChannelsMock('api-token');

        $api->expects($this->once())
            ->method('rename')
            ->with("C123", "test")
            ->will($this->returnValue($api));

        $api->rename("C123", "test");
    }

    public function testRepliesWithWrongParametersReturnsException()
    {
        $api = $this->getApiChannelsMock('api-token');

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
        $api = $this->getApiChannelsMock('api-token');

        $api->expects($this->once())
            ->method('replies')
            ->with("C123", "123.456")
            ->will($this->returnValue($api));

        $api->replies("C123", "123.456");
    }

    public function testPurposeWithWrongParametersReturnsException()
    {
        $api = $this->getApiChannelsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('setPurpose')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->setPurpose(array(), array());
    }
    
    public function testPurposeRequestShouldReturnApiObject()
    {
        $api = $this->getApiChannelsMock('api-token');

        $api->expects($this->once())
            ->method('setPurpose')
            ->with("C123", "Foo bar")
            ->will($this->returnValue($api));

        $api->setPurpose("C123", "Foo bar");
    }

    public function testTopicWithWrongParametersReturnsException()
    {
        $api = $this->getApiChannelsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('setTopic')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->setTopic(array(), array());
    }
    
    public function testTopicRequestShouldReturnApiObject()
    {
        $api = $this->getApiChannelsMock('api-token');

        $api->expects($this->once())
            ->method('setTopic')
            ->with("C123", "Foo bar")
            ->will($this->returnValue($api));

        $api->setTopic("C123", "Foo bar");
    }

    public function testUnarchiveWithWrongParametersReturnsException()
    {
        $api = $this->getApiChannelsMock('api-token');

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
        $api = $this->getApiChannelsMock('api-token');

        $api->expects($this->once())
            ->method('unarchive')
            ->with("C123")
            ->will($this->returnValue($api));

        $api->unarchive("C123");
    }
}
