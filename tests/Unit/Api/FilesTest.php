<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\Files;
use Strime\Slackify\Exception\InvalidArgumentException;
use Strime\Slackify\Exception\RuntimeException;

class FilesTest extends AbstractApiTestCase
{
    public function testDeleteWithWrongParametersReturnsException()
    {
        $api = $this->getApiFilesMock('api-token');

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
        $api = $this->getApiFilesMock('api-token');

        $api->expects($this->once())
            ->method('delete')
            ->with("F12345")
            ->will($this->returnValue($api));

        $api->delete("F12345");
    }

    public function testInfoWithWrongParametersReturnsException()
    {
        $api = $this->getApiFilesMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('info')
            ->with(array(), array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->info(array(), array(), array());
    }
    
    public function testInfoRequestShouldReturnApiObject()
    {
        $api = $this->getApiFilesMock('api-token');

        $api->expects($this->once())
            ->method('info')
            ->with("F12345", 10, 10)
            ->will($this->returnValue($api));

        $api->info("F12345", 10, 10);
    }

    public function testListWithWrongParametersReturnsException()
    {
        $api = $this->getApiFilesMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('list')
            ->with(array(), array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->list(array(), array(), array());
    }
    
    public function testListRequestShouldReturnApiObject()
    {
        $api = $this->getApiFilesMock('api-token');

        $api->expects($this->once())
            ->method('info')
            ->with("U12345", NULL, (string)time())
            ->will($this->returnValue($api));

        $api->info("U12345", NULL, (string)time());
    }

    public function testRevokePublicUrlWithWrongParametersReturnsException()
    {
        $api = $this->getApiFilesMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('revokePublicURL')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->revokePublicURL(array());
    }
    
    public function testRevokePublicUrlRequestShouldReturnApiObject()
    {
        $api = $this->getApiFilesMock('api-token');

        $api->expects($this->once())
            ->method('revokePublicURL')
            ->with("F12345")
            ->will($this->returnValue($api));

        $api->revokePublicURL("F12345");
    }
    
    public function testSharedPublicUrlWithWrongParametersReturnsException()
    {
        $api = $this->getApiFilesMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('sharedPublicURL')
            ->with(array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->sharedPublicURL(array());
    }
    
    public function testSharedPublicUrlRequestShouldReturnApiObject()
    {
        $api = $this->getApiFilesMock('api-token');

        $api->expects($this->once())
            ->method('sharedPublicURL')
            ->with("F12345")
            ->will($this->returnValue($api));

        $api->sharedPublicURL("F12345");
    }
    
    public function testUploadWithWrongParametersReturnsException()
    {
        $api = $this->getApiFilesMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('upload')
            ->with(array(), array(), array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->upload(array(), array(), array(), array());
    }
    
    public function testUploadWithWrongPathToFileReturnsException()
    {
        $api = $this->getApiFilesMock('api-token');

        $failure = new RuntimeException('Failed to send the message.');
        $api->expects($this->once())
            ->method('upload')
            ->with("foo.txt", "/wrong/path/to/file")
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\RuntimeException');
        $api->upload("foo.txt", "/wrong/path/to/file");
    }
    
    public function testUploadRequestShouldReturnApiObject()
    {
        $api = $this->getApiFilesMock('api-token');

        $api->expects($this->once())
            ->method('upload')
            ->with("F12345", __DIR__ . "/../../files/test.txt", "text")
            ->will($this->returnValue($api));

        $api->upload("F12345", __DIR__ . "/../../files/test.txt", "text");
    }
}
