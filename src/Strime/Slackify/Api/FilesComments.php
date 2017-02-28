<?php

/*
 * This file is part of Slackify.
 *
 * (c) Strime <contact@strime.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Strime\Slackify\Api;

use Strime\Slackify\Exception\RuntimeException;
use Strime\Slackify\Exception\InvalidArgumentException;
use GuzzleHttp\Exception\RequestException;

class FilesComments extends AbstractApi
{
    /**
     * {@inheritdoc}
     *
     * @param  string $file
     * @param  string $comment
     * @param  string $channel
     * @return FilesComments
     */
    public function add($file, $comment, $channel = NULL) {

        // Check if the type of the variables is valid.
        if (!is_string($file)) {
            throw new InvalidArgumentException("The type of the file variable is not valid.");
        }
        if (!is_string($comment)) {
            throw new InvalidArgumentException("The type of the comment variable is not valid.");
        }
        if (($channel != NULL) && !is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "file" => $file,
            "comment" => $comment
        );

        if($channel != NULL) {
            $arguments["channel"] = $channel;
        }

        $this->setUrl("files.comments.add", $arguments);

        // Send the request
        try {
            $client = new \GuzzleHttp\Client();
            $json_response = $client->request('GET', $this->getUrl(), []);
            $response = json_decode( $json_response->getBody() );
        }
        catch (RequestException $e) {
            throw new RuntimeException('The request to the API failed: '.$e->getMessage(), $e->getCode(), $e);
        }

        if($response->{'ok'} === FALSE) {
            throw new RuntimeException('The request to the API failed: '.$response->{'error'}.".");
        }

        return $json_response->getBody();
    }


    /**
     * {@inheritdoc}
     *
     * @param  string $file
     * @param  string $id
     * @return FilesComments
     */
    public function delete($file, $id) {

        // Check if the type of the variables is valid.
        if (!is_string($file)) {
            throw new InvalidArgumentException("The type of the file variable is not valid.");
        }
        if (!is_string($id)) {
            throw new InvalidArgumentException("The type of the id variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "file" => $file,
            "id" => $id
        );

        $this->setUrl("files.comments.delete", $arguments);

        // Send the request
        try {
            $client = new \GuzzleHttp\Client();
            $json_response = $client->request('GET', $this->getUrl(), []);
            $response = json_decode( $json_response->getBody() );
        }
        catch (RequestException $e) {
            throw new RuntimeException('The request to the API failed: '.$e->getMessage(), $e->getCode(), $e);
        }

        if($response->{'ok'} === FALSE) {
            throw new RuntimeException('The request to the API failed: '.$response->{'error'}.".");
        }

        return $this;
    }


    /**
     * {@inheritdoc}
     *
     * @param  string $file
     * @param  string $id
     * @param  string $comment
     * @return FilesComments
     */
    public function edit($file, $id, $comment) {

        // Check if the type of the variables is valid.
        if (!is_string($file)) {
            throw new InvalidArgumentException("The type of the file variable is not valid.");
        }
        if (!is_string($id)) {
            throw new InvalidArgumentException("The type of the id variable is not valid.");
        }
        if (!is_string($comment)) {
            throw new InvalidArgumentException("The type of the comment variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "file" => $file,
            "id" => $id,
            "comment" => $comment
        );

        $this->setUrl("files.comments.edit", $arguments);

        // Send the request
        try {
            $client = new \GuzzleHttp\Client();
            $json_response = $client->request('GET', $this->getUrl(), []);
            $response = json_decode( $json_response->getBody() );
        }
        catch (RequestException $e) {
            throw new RuntimeException('The request to the API failed: '.$e->getMessage(), $e->getCode(), $e);
        }

        if($response->{'ok'} === FALSE) {
            throw new RuntimeException('The request to the API failed: '.$response->{'error'}.".");
        }

        return $json_response->getBody();
    }
}
