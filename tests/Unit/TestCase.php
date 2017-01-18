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

    public function getWebhookMock()
    {
        return $this->getMockBuilder('Strime\Slackify\Webhooks\Webhook')
            ->disableOriginalConstructor()
            ->getMock();
    }
}
