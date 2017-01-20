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

    public function getWebhookMock($url = null)
    {
        $webhook = $this->getMockBuilder('Strime\Slackify\Webhooks\Webhook')
            ->disableOriginalConstructor()
            ->getMock();

        $webhook->expects($this->any())
            ->method('getUrl')
            ->will($this->returnValue($url));

        return $webhook;
    }

    public function getApiMock($token = null)
    {
        $api = $this->getMockBuilder('Strime\Slackify\Api\Api')
            ->disableOriginalConstructor()
            ->getMock();

        $api->expects($this->any())
            ->method('getToken')
            ->will($this->returnValue($token));

        return $api;
    }

    public function getApiAuthMock($token = null)
    {
        $api = $this->getMockBuilder('Strime\Slackify\Api\Auth')
            ->disableOriginalConstructor()
            ->getMock();

        $api->expects($this->any())
            ->method('getToken')
            ->will($this->returnValue($token));

        return $api;
    }
}
