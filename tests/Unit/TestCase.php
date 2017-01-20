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
}
