<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\Bots;
use Strime\Slackify\Exception\InvalidArgumentException;

class EmojiTest extends AbstractApiTestCase
{
    public function testEmojiRequestShouldReturnJsonObject()
    {
        $api = $this->getApiEmojiMock('api-token');

        $api->expects($this->once())
            ->method('list')
            ->with()
            ->will($this->returnValue("string"));

        $api->list();
    }
}
