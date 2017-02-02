<?php

namespace Tests\Strime\Slackify\Unit;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function assertScalar($value)
    {
        $this->assertTrue(is_scalar($value));
    }

    public function getLoggerMock()
    {
        return $this->getMock('Psr\Log\LoggerInterface');
    }

    public function getCacheMock()
    {
        return $this->getMock('Doctrine\Common\Cache\Cache');
    }

    public function getWebhookMock($url)
    {
        $webhook = $this->getMockBuilder('Strime\Slackify\Webhooks\Webhook')
            ->disableOriginalConstructor()
            ->getMock();

        $webhook->expects($this->any())
            ->method('getUrl')
            ->will($this->returnValue($url));

        return $webhook;
    }

    public function getApiMock($token)
    {
        $api = $this->getMockBuilder('Strime\Slackify\Api\Api')
            ->disableOriginalConstructor()
            ->getMock();

        $api->expects($this->any())
            ->method('getToken')
            ->will($this->returnValue($token));

        return $api;
    }

    public function getApiAuthMock($token)
    {
        $api = $this->getMockBuilder('Strime\Slackify\Api\Auth')
            ->disableOriginalConstructor()
            ->getMock();

        $api->expects($this->any())
            ->method('getToken')
            ->will($this->returnValue($token));

        return $api;
    }

    public function getApiBotsMock($token)
    {
        $api = $this->getMockBuilder('Strime\Slackify\Api\Bots')
            ->disableOriginalConstructor()
            ->getMock();

        $api->expects($this->any())
            ->method('getToken')
            ->will($this->returnValue($token));

        return $api;
    }

    public function getApiChannelsMock($token)
    {
        $api = $this->getMockBuilder('Strime\Slackify\Api\Channels')
            ->disableOriginalConstructor()
            ->getMock();

        $api->expects($this->any())
            ->method('getToken')
            ->will($this->returnValue($token));

        return $api;
    }

    public function getApiChatMock($token)
    {
        $api = $this->getMockBuilder('Strime\Slackify\Api\Chat')
            ->disableOriginalConstructor()
            ->getMock();

        $api->expects($this->any())
            ->method('getToken')
            ->will($this->returnValue($token));

        return $api;
    }

    public function getApiDndMock($token)
    {
        $api = $this->getMockBuilder('Strime\Slackify\Api\Dnd')
            ->disableOriginalConstructor()
            ->getMock();

        $api->expects($this->any())
            ->method('getToken')
            ->will($this->returnValue($token));

        return $api;
    }

    public function getApiEmojiMock($token)
    {
        $api = $this->getMockBuilder('Strime\Slackify\Api\Emoji')
            ->disableOriginalConstructor()
            ->getMock();

        $api->expects($this->any())
            ->method('getToken')
            ->will($this->returnValue($token));

        return $api;
    }

    public function getApiFilesCommentsMock($token)
    {
        $api = $this->getMockBuilder('Strime\Slackify\Api\FilesComments')
            ->disableOriginalConstructor()
            ->getMock();

        $api->expects($this->any())
            ->method('getToken')
            ->will($this->returnValue($token));

        return $api;
    }

    public function getApiFilesMock($token)
    {
        $api = $this->getMockBuilder('Strime\Slackify\Api\Files')
            ->disableOriginalConstructor()
            ->getMock();

        $api->expects($this->any())
            ->method('getToken')
            ->will($this->returnValue($token));

        return $api;
    }

    public function getApiGroupsMock($token)
    {
        $api = $this->getMockBuilder('Strime\Slackify\Api\Groups')
            ->disableOriginalConstructor()
            ->getMock();

        $api->expects($this->any())
            ->method('getToken')
            ->will($this->returnValue($token));

        return $api;
    }

    public function getApiImMock($token)
    {
        $api = $this->getMockBuilder('Strime\Slackify\Api\Im')
            ->disableOriginalConstructor()
            ->getMock();

        $api->expects($this->any())
            ->method('getToken')
            ->will($this->returnValue($token));

        return $api;
    }

    public function getApiMpimMock($token)
    {
        $api = $this->getMockBuilder('Strime\Slackify\Api\Mpim')
            ->disableOriginalConstructor()
            ->getMock();

        $api->expects($this->any())
            ->method('getToken')
            ->will($this->returnValue($token));

        return $api;
    }

    public function getApiOauthMock($token)
    {
        $api = $this->getMockBuilder('Strime\Slackify\Api\Oauth')
            ->disableOriginalConstructor()
            ->getMock();

        $api->expects($this->any())
            ->method('getToken')
            ->will($this->returnValue($token));

        return $api;
    }

    public function getApiPinMock($token)
    {
        $api = $this->getMockBuilder('Strime\Slackify\Api\Pin')
            ->disableOriginalConstructor()
            ->getMock();

        $api->expects($this->any())
            ->method('getToken')
            ->will($this->returnValue($token));

        return $api;
    }

    public function getApiReactionsMock($token)
    {
        $api = $this->getMockBuilder('Strime\Slackify\Api\Reactions')
            ->disableOriginalConstructor()
            ->getMock();

        $api->expects($this->any())
            ->method('getToken')
            ->will($this->returnValue($token));

        return $api;
    }

    public function getApiRemindersMock($token)
    {
        $api = $this->getMockBuilder('Strime\Slackify\Api\Reminders')
            ->disableOriginalConstructor()
            ->getMock();

        $api->expects($this->any())
            ->method('getToken')
            ->will($this->returnValue($token));

        return $api;
    }

    public function getApiRtmMock($token)
    {
        $api = $this->getMockBuilder('Strime\Slackify\Api\Rtm')
            ->disableOriginalConstructor()
            ->getMock();

        $api->expects($this->any())
            ->method('getToken')
            ->will($this->returnValue($token));

        return $api;
    }
}
