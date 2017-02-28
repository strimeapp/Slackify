<?php

namespace Tests\Strime\Slackify\Unit\Api;

use Strime\Slackify\Api\FilesComments;
use Strime\Slackify\Exception\InvalidArgumentException;

class FilesCommentsTest extends AbstractApiTestCase
{
    public function testAddWithWrongParametersReturnsException()
    {
        $api = $this->getApiFilesCommentsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('add')
            ->with(array(), array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->add(array(), array(), array());
    }

    public function testAddRequestShouldReturnJsonObject()
    {
        $api = $this->getApiFilesCommentsMock('api-token');

        $api->expects($this->once())
            ->method('add')
            ->with("F12345", "Foo bar", "U12345")
            ->will($this->returnValue("string"));

        $api->add("F12345", "Foo bar", "U12345");
    }

    public function testDeleteWithWrongParametersReturnsException()
    {
        $api = $this->getApiFilesCommentsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('delete')
            ->with(array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->delete(array(), array());
    }

    public function testDeleteRequestShouldReturnApiObject()
    {
        $api = $this->getApiFilesCommentsMock('api-token');

        $api->expects($this->once())
            ->method('delete')
            ->with("F12345", "Fc12345")
            ->will($this->returnValue($api));

        $api->delete("F12345", "Fc12345");
    }

    public function testEditWithWrongParametersReturnsException()
    {
        $api = $this->getApiFilesCommentsMock('api-token');

        $failure = new InvalidArgumentException('Failed to send the message.');
        $api->expects($this->once())
            ->method('edit')
            ->with(array(), array(), array())
            ->will($this->throwException($failure));

        $this->setExpectedException('Strime\Slackify\Exception\InvalidArgumentException');
        $api->edit(array(), array(), array());
    }

    public function testEditRequestShouldReturnJsonObject()
    {
        $api = $this->getApiFilesCommentsMock('api-token');

        $api->expects($this->once())
            ->method('edit')
            ->with("F12345", "Fc12345", "Foo bar")
            ->will($this->returnValue("string"));

        $api->edit("F12345", "Fc12345", "Foo bar");
    }
}
