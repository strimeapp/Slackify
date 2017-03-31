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

class Reactions extends AbstractApi
{
    /**
     * {@inheritdoc}
     *
     * @param  string $name
     * @param  string $file
     * @param  string $file_comment
     * @param  string $channel
     * @param  float $timestamp
     * @return Reactions
     */
    public function add($name, $file = NULL, $file_comment = NULL, $channel = NULL, $timestamp = NULL) {

        // Check if the type of the variables is valid.
        if (!is_string($name)) {
            throw new InvalidArgumentException("The type of the name variable is not valid.");
        }
        if (($file != NULL) && !is_string($file)) {
            throw new InvalidArgumentException("The type of the file variable is not valid.");
        }
        if (($file_comment != NULL) && !is_string($file_comment)) {
            throw new InvalidArgumentException("The type of the file_comment variable is not valid.");
        }
        if (($channel != NULL) && !is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }
        if (($timestamp != NULL) && !is_float($timestamp)) {
            throw new InvalidArgumentException("The type of the timestamp variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "name" => $name
        );

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

        $this->setUrl("reactions.add", $arguments);

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
     * @param  string $file_comment
     * @param  string $channel
     * @param  float $timestamp
     * @param  boolean $full
     * @return Reactions
     */
    public function get($file = NULL, $file_comment = NULL, $channel = NULL, $timestamp = NULL, $full = NULL) {

        // Check if the type of the variables is valid.
        if (($file != NULL) && !is_string($file)) {
            throw new InvalidArgumentException("The type of the file variable is not valid.");
        }
        if (($file_comment != NULL) && !is_string($file_comment)) {
            throw new InvalidArgumentException("The type of the file_comment variable is not valid.");
        }
        if (($channel != NULL) && !is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }
        if (($timestamp != NULL) && !is_float($timestamp)) {
            throw new InvalidArgumentException("The type of the timestamp variable is not valid.");
        }
        if (($full != NULL) && !is_bool($full)) {
            throw new InvalidArgumentException("The type of the full variable is not valid.");
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
        if ($full != NULL) {
            $arguments["full"] = $full;
        }

        $this->setUrl("reactions.get", $arguments);

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
     * @param  string $user
     * @param  boolean $full
     * @param  string $count
     * @param  string $page
     * @return Reactions
     */
    public function list_reactions($user = NULL, $full = NULL, $count = 100, $page = 1) {

        // Check if the type of the variables is valid.
        if (($user != NULL) && !is_string($user)) {
            throw new InvalidArgumentException("The type of the user variable is not valid.");
        }
        if (($full != NULL) && !is_bool($full)) {
            throw new InvalidArgumentException("The type of the full variable is not valid.");
        }
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

        if($user != NULL) {
            $arguments["user"] = $user;
        }
        if($full != NULL) {
            $arguments["full"] = $full;
        }

        $this->setUrl("reactions.list");

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
     * @param  string $name
     * @param  string $file
     * @param  string $file_comment
     * @param  string $channel
     * @param  float $timestamp
     * @return Reactions
     */
    public function remove($name, $file = NULL, $file_comment = NULL, $channel = NULL, $timestamp = NULL) {

        // Check if the type of the variables is valid.
        if (!is_string($name)) {
            throw new InvalidArgumentException("The type of the name variable is not valid.");
        }
        if (($file != NULL) && !is_string($file)) {
            throw new InvalidArgumentException("The type of the file variable is not valid.");
        }
        if (($file_comment != NULL) && !is_string($file_comment)) {
            throw new InvalidArgumentException("The type of the file_comment variable is not valid.");
        }
        if (($channel != NULL) && !is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }
        if (($timestamp != NULL) && !is_float($timestamp)) {
            throw new InvalidArgumentException("The type of the timestamp variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "name" => $name
        );

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

        $this->setUrl("reactions.remove", $arguments);

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
