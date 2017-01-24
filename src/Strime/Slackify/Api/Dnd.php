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

class Dnd extends AbstractApi
{
    /**
     * {@inheritdoc}
     *
     * @return Dnd
     */
    public function endDnd() {

        $this->setUrl("dnd.endDnd");

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
     * @return Dnd
     */
    public function endSnooze() {

        $this->setUrl("dnd.endSnooze");

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
     * @param  string $user
     * @return Dnd
     */
    public function info($user = NULL) {

        // Check if the type of the variables is valid.
        if (($user != NULL) && !is_string($user)) {
            throw new InvalidArgumentException("The type of the user variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array();

        if($user != NULL) {
            $arguments["user"] = $user;
        }

        $this->setUrl("dnd.info", $arguments);

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
     * @param  integer $num_minutes
     * @return Dnd
     */
    public function setSnooze($num_minutes) {

        // Check if the type of the variables is valid.
        if (!is_integer($num_minutes)) {
            throw new InvalidArgumentException("The type of the num_minutes variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "num_minutes" => $num_minutes
        );

        $this->setUrl("dnd.setSnooze", $arguments);

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
     * @return Dnd
     */
    public function teamInfo($users = NULL) {

        // Check if the type of the variables is valid.
        if (($user != NULL) && !is_string($user)) {
            throw new InvalidArgumentException("The type of the users variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array();

        if($user != NULL) {
            $arguments["users"] = $users;
        }

        $this->setUrl("dnd.info", $arguments);

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
