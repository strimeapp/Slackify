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

class Mpim extends AbstractApi
{
    /**
     * {@inheritdoc}
     *
     * @param  string $channel
     * @return Mpim
     */
    public function close($channel) {

        // Check if the type of the variables is valid.
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "channel" => $channel
        );

        $this->setUrl("mpim.close", $arguments);

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
     * @param  string $latest
     * @param  string $oldest
     * @param  integer $inclusive
     * @param  integer $count
     * @param  integer $unreads
     * @return Mpim
     */
    public function history($channel, $latest = "now", $oldest = "0", $inclusive = 0, $count = 100, $unreads = 0) {

        // Check if the type of the variables is valid.
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }
        if (!is_string($latest)) {
            throw new InvalidArgumentException("The type of the latest variable is not valid.");
        }
        if (!is_string($oldest)) {
            throw new InvalidArgumentException("The type of the oldest variable is not valid.");
        }
        if (!is_integer($inclusive)) {
            throw new InvalidArgumentException("The type of the inclusive variable is not valid.");
        }
        if (!is_integer($count)) {
            throw new InvalidArgumentException("The type of the count variable is not valid.");
        }
        if (!is_integer($unreads)) {
            throw new InvalidArgumentException("The type of the unreads variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "channel" => $channel,
            "latest" => $latest,
            "oldest" => $oldest,
            "inclusive" => (string)$inclusive,
            "count" => (string)$count,
            "unreads" => (string)$unreads
        );

        $this->setUrl("mpim.history", $arguments);

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
     * @return Mpim
     */
    public function list_mpim() {

        $this->setUrl("mpim.list");

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
     * @param  float $ts
     * @return Mpim
     */
    public function mark($channel, $ts) {

        // Check if the type of the variables is valid.
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }
        if (!is_float($ts)) {
            throw new InvalidArgumentException("The type of the ts variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "channel" => $channel,
            "ts" => (string)$ts
        );

        $this->setUrl("mpim.mark", $arguments);

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
     * @param  string $users
     * @param  boolean $return_im
     * @return Mpim
     */
    public function open($users, $return_im = NULL) {

        // Check if the type of the variables is valid.
        if (!is_string($users)) {
            throw new InvalidArgumentException("The type of the users variable is not valid.");
        }
        if (!is_bool($return_im)) {
            throw new InvalidArgumentException("The type of the return_im variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "users" => $users
        );

        if(($return_im != NULL) && ($return_im === TRUE)) {
            $arguments["return_im"] = 1;
        }
        elseif(($return_im != NULL) && ($return_im === FALSE)) {
            $arguments["return_im"] = 0;
        }

        $this->setUrl("mpim.open", $arguments);

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
     * @param  float $thread_ts
     * @return Mpim
     */
    public function replies($channel, $thread_ts) {

        // Check if the type of the variables is valid.
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }
        if (!is_float($thread_ts)) {
            throw new InvalidArgumentException("The type of the thread_ts variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "channel" => $channel,
            "thread_ts" => (string)$thread_ts
        );

        $this->setUrl("mpim.replies", $arguments);

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
