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

class Channels extends AbstractApi
{
    /**
     * {@inheritdoc}
     *
     * @param  string $channel
     * @return Channels
     */
    public function archive($channel) {

        // Check if the type of the variables is valid.
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "channel" => $channel
        );

        $this->setUrl("channels.archive", $arguments);

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
     * @param  string $name
     * @return Channels
     */
    public function create($name) {

        // Check if the type of the variables is valid.
        if (!is_string($name)) {
            throw new InvalidArgumentException("The type of the name variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "name" => $name
        );

        $this->setUrl("channels.create", $arguments);

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
     * @param  string $latest
     * @param  integer $oldest
     * @param  integer $inclusive
     * @param  integer $count
     * @param  integer $unreads
     * @return Channels
     */
    public function history($channel, $latest = "now", $oldest = 0, $inclusive = 0, $count = 100, $unreads = 0) {

        // Check if the type of the variables is valid.
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }
        if (!is_integer($oldest)) {
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
            "inclusive" => $inclusive,
            "count" => $count,
            "unreads" => $unreads
        );

        $this->setUrl("channels.history", $arguments);

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
     * @return Channels
     */
    public function info($channel) {

        // Check if the type of the variables is valid.
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "channel" => $channel
        );

        $this->setUrl("channels.info", $arguments);

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
     * @param  string $user
     * @return Channels
     */
    public function invite($channel, $user) {

        // Check if the type of the variables is valid.
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }
        if (!is_string($user)) {
            throw new InvalidArgumentException("The type of the user variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "channel" => $channel,
            "user" => $user
        );

        $this->setUrl("channels.invite", $arguments);

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
     * @return Channels
     */
    public function join($channel) {

        // Check if the type of the variables is valid.
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "name" => $channel
        );

        $this->setUrl("channels.join", $arguments);

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
     * @param  string $user
     * @return Channels
     */
    public function kick($channel, $user) {

        // Check if the type of the variables is valid.
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }
        if (!is_string($user)) {
            throw new InvalidArgumentException("The type of the user variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "channel" => $channel,
            "user" => $user
        );

        $this->setUrl("channels.kick", $arguments);

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
     * @return Channels
     */
    public function leave($channel) {

        // Check if the type of the variables is valid.
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "channel" => $channel
        );

        $this->setUrl("channels.leave", $arguments);

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
     * @param  string $exclude_archived
     * @return Channels
     */
    public function list_channels($exclude_archived = 0) {

        // Check if the type of the variables is valid.
        if (!is_integer($exclude_archived)) {
            throw new InvalidArgumentException("The type of the exclude_archived variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "exclude_archived" => $exclude_archived
        );

        $this->setUrl("channels.list", $arguments);

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
     * @return Channels
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

        $this->setUrl("channels.mark", $arguments);

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
     * @param  string $name
     * @param  boolean $validate
     * @return Channels
     */
    public function rename($channel, $name, $validate = TRUE) {

        // Check if the type of the variables is valid.
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }
        if (!is_string($name)) {
            throw new InvalidArgumentException("The type of the name variable is not valid.");
        }
        if (!is_bool($validate)) {
            throw new InvalidArgumentException("The type of the validate variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "channel" => $channel,
            "name" => $name,
            "validate" => $validate
        );

        $this->setUrl("channels.rename", $arguments);

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
     * @return Channels
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

        $this->setUrl("channels.replies", $arguments);

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
     * @param  string $purpose
     * @return Channels
     */
    public function setPurpose($channel, $purpose) {

        // Check if the type of the variables is valid.
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }
        if (!is_string($purpose)) {
            throw new InvalidArgumentException("The type of the purpose variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "channel" => $channel,
            "purpose" => $purpose
        );

        $this->setUrl("channels.setPurpose", $arguments);

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
     * @param  string $topic
     * @return Channels
     */
    public function setTopic($channel, $topic) {

        // Check if the type of the variables is valid.
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }
        if (!is_string($topic)) {
            throw new InvalidArgumentException("The type of the topic variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "channel" => $channel,
            "topic" => $topic
        );

        $this->setUrl("channels.setTopic", $arguments);

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
     * @return Channels
     */
    public function unarchive($channel) {

        // Check if the type of the variables is valid.
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "channel" => $channel
        );

        $this->setUrl("channels.unarchive", $arguments);

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
