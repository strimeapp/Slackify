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

class Pin extends AbstractApi
{
    /**
     * {@inheritdoc}
     *
     * @param  string $channel
     * @param  string $file
     * @param  string $file_comment
     * @param  float $timestamp
     * @return Pin
     */
    public function add($channel, $file = NULL, $file_comment = NULL, $timestamp = NULL) {

        // Check if the type of the variables is valid.
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }
        if (($file != NULL) && !is_string($file)) {
            throw new InvalidArgumentException("The type of the file variable is not valid.");
        }
        if (($file_comment != NULL) && !is_string($file_comment)) {
            throw new InvalidArgumentException("The type of the file_comment variable is not valid.");
        }
        if (($timestamp != NULL) && !is_float($timestamp)) {
            throw new InvalidArgumentException("The type of the timestamp variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "channel" => $channel
        );

        if ($file != NULL) {
            $arguments["file"] = $file;
        }
        if ($file_comment != NULL) {
            $arguments["file_comment"] = $file_comment;
        }
        if ($timestamp != NULL) {
            $arguments["timestamp"] = (string)$timestamp;
        }

        $this->setUrl("pin.add", $arguments);

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
     * @param  string $channel
     * @return string
     */
    public function list_pin($channel) {

        // Check if the type of the variables is valid.
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "channel" => $channel
        );

        $this->setUrl("pin.list");

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
     * @param  string $channel
     * @param  string $file
     * @param  string $file_comment
     * @param  float $timestamp
     * @return Pin
     */
    public function remove($channel, $file = NULL, $file_comment = NULL, $timestamp = NULL) {

        // Check if the type of the variables is valid.
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }
        if (($file != NULL) && !is_string($file)) {
            throw new InvalidArgumentException("The type of the file variable is not valid.");
        }
        if (($file_comment != NULL) && !is_string($file_comment)) {
            throw new InvalidArgumentException("The type of the file_comment variable is not valid.");
        }
        if (($timestamp != NULL) && !is_float($timestamp)) {
            throw new InvalidArgumentException("The type of the timestamp variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "channel" => $channel
        );

        if ($file != NULL) {
            $arguments["file"] = $file;
        }
        if ($file_comment != NULL) {
            $arguments["file_comment"] = $file_comment;
        }
        if ($timestamp != NULL) {
            $arguments["timestamp"] = (string)$timestamp;
        }

        $this->setUrl("pin.remove", $arguments);

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
}
