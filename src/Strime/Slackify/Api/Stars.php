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

class Stars extends AbstractApi
{
    /**
     * {@inheritdoc}
     *
     * @param  string $file
     * @param  string $file_comment
     * @param  string $channel
     * @param  float $timestamp
     * @return Stars
     */
    public function add($file = NULL, $file_comment = NULL, $channel = NULL, $timestamp = NULL) {

        // Check if the type of the variables is valid.
        if (!is_string($file) && ($file != NULL)) {
            throw new InvalidArgumentException("The type of the file variable is not valid.");
        }
        if (!is_string($file_comment) && ($file_comment != NULL)) {
            throw new InvalidArgumentException("The type of the file_comment variable is not valid.");
        }
        if (!is_string($channel) && ($channel != NULL)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }
        if (!is_float($timestamp) && ($timestamp != NULL)) {
            throw new InvalidArgumentException("The type of the timestamp variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array();

        if ($file != NULL) {
            $arguments["file"] = $file;
        }
        if ($file_comment != NULL) {
            $arguments["file_comment"] = $file_comment;
        }
        if ($channel != NULL) {
            $arguments["channel"] = $channel;
        }
        if ($timestamp != NULL) {
            $arguments["timestamp"] = (string)$timestamp;
        }

        $this->setUrl("stars.add", $arguments);

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
     * @param  int $count
     * @param  int $page
     * @return string
     */
    public function list($count = 100, $page = 1) {

        // Check if the type of the variables is valid.
        if (!is_integer($count)) {
            throw new InvalidArgumentException("The type of the count variable is not valid.");
        }
        if (!is_integer($page)) {
            throw new InvalidArgumentException("The type of the page variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "count" => $count,
            "page" => $page
        );

        $this->setUrl("stars.list", $arguments);

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
     * @param  string $file_comment
     * @param  string $channel
     * @param  float $timestamp
     * @return Stars
     */
    public function remove($file = NULL, $file_comment = NULL, $channel = NULL, $timestamp = NULL) {

        // Check if the type of the variables is valid.
        if (!is_string($file) && ($file != NULL)) {
            throw new InvalidArgumentException("The type of the file variable is not valid.");
        }
        if (!is_string($file_comment) && ($file_comment != NULL)) {
            throw new InvalidArgumentException("The type of the file_comment variable is not valid.");
        }
        if (!is_string($channel) && ($channel != NULL)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }
        if (!is_float($timestamp) && ($timestamp != NULL)) {
            throw new InvalidArgumentException("The type of the timestamp variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array();

        if ($file != NULL) {
            $arguments["file"] = $file;
        }
        if ($file_comment != NULL) {
            $arguments["file_comment"] = $file_comment;
        }
        if ($channel != NULL) {
            $arguments["channel"] = $channel;
        }
        if ($timestamp != NULL) {
            $arguments["timestamp"] = (float)$timestamp;
        }

        $this->setUrl("stars.remove", $arguments);

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
