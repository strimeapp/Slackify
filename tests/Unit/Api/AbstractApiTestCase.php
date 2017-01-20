<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\Api;
use Tests\Strime\Slackify\Unit\TestCase;

abstract class AbstractApiTestCase extends TestCase
{
    public function testGetUrlReturnsUrl()
    {
    	$api = new Api('api-token');
    	$api->setUrl("foo");
        $this->assertRegexp('/https:\/\/slack\.com\/api\/(.*)?/', $api->getUrl());
    }
}
