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

class Groups extends AbstractApi
{
    /**
     * {@inheritdoc}
     *
     * @param  string $channel
     * @return Groups
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

        $this->setUrl("groups.archive", $arguments);

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
     * @return Groups
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

        $this->setUrl("groups.close", $arguments);

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
     * @return Groups
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

        $this->setUrl("groups.create", $arguments);

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
     * @return Groups
     */
    public function createChild($channel) {

        // Check if the type of the variables is valid.
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "channel" => $channel
        );

        $this->setUrl("groups.createChild", $arguments);

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
     * @param  string $oldest
     * @param  integer $inclusive
     * @param  integer $count
     * @param  integer $unreads
     * @return Groups
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

        $this->setUrl("groups.history", $arguments);

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
     * @return Groups
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

        $this->setUrl("groups.info", $arguments);

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
     * @return Groups
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

        $this->setUrl("groups.invite", $arguments);

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
     * @return Groups
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

        $this->setUrl("groups.kick", $arguments);

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
     * @return Groups
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

        $this->setUrl("groups.leave", $arguments);

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
     * @param  integer $exclude_archived
     * @return Groups
     */
    public function list_groups($exclude_archived = 0) {

        // Check if the type of the variables is valid.
        if (!is_integer($exclude_archived)) {
            throw new InvalidArgumentException("The type of the exclude_archived variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "exclude_archived" => (string)$exclude_archived
        );

        $this->setUrl("groups.list", $arguments);

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
     * @param  string $ts
     * @return Groups
     */
    public function mark($channel, $ts) {

        // Check if the type of the variables is valid.
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }
        if (!is_string($ts)) {
            throw new InvalidArgumentException("The type of the ts variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "channel" => $channel,
            "ts" => $ts
        );

        $this->setUrl("groups.mark", $arguments);

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
     * @return Groups
     */
    public function open($channel) {

        // Check if the type of the variables is valid.
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "channel" => $channel
        );

        $this->setUrl("groups.open", $arguments);

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
     * @param  string $name
     * @return Groups
     */
    public function rename($channel, $name) {

        // Check if the type of the variables is valid.
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }
        if (!is_string($name)) {
            throw new InvalidArgumentException("The type of the name variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "channel" => $channel,
            "name" => $name
        );

        $this->setUrl("groups.rename", $arguments);

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
     * @return Groups
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

        $this->setUrl("groups.replies", $arguments);

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
     * @return Groups
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

        $this->setUrl("groups.setPurpose", $arguments);

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
     * @return Groups
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

        $this->setUrl("groups.setTopic", $arguments);

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
     * @return Groups
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

        $this->setUrl("groups.unarchive", $arguments);

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
