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

class Reminders extends AbstractApi
{
    /**
     * {@inheritdoc}
     *
     * @param  string $text
     * @param  string $time
     * @param  string $user
     * @return Reminders
     */
    public function add($text, $time, $user = NULL) {

        // Check if the type of the variables is valid.
        if (!is_string($text)) {
            throw new InvalidArgumentException("The type of the text variable is not valid.");
        }
        if (!is_string($time)) {
            throw new InvalidArgumentException("The type of the time variable is not valid.");
        }
        if (($user != NULL) && !is_string($user)) {
            throw new InvalidArgumentException("The type of the user variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "text" => $text,
            "time" => $time
        );

        if ($user != NULL) {
            $arguments["user"] = $user;
        }

        $this->setUrl("reminders.add", $arguments);

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
     * @param  string $reminder
     * @return Reminders
     */
    public function complete($reminder) {

        // Check if the type of the variables is valid.
        if (!is_string($reminder)) {
            throw new InvalidArgumentException("The type of the reminder variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "reminder" => $reminder
        );

        $this->setUrl("reminders.complete", $arguments);

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
     * @param  string $reminder
     * @return Reminders
     */
    public function delete($reminder) {

        // Check if the type of the variables is valid.
        if (!is_string($reminder)) {
            throw new InvalidArgumentException("The type of the reminder variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "reminder" => $reminder
        );

        $this->setUrl("reminders.delete", $arguments);

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
     * @param  string $reminder
     * @return string
     */
    public function info($reminder) {

        // Check if the type of the variables is valid.
        if (!is_string($reminder)) {
            throw new InvalidArgumentException("The type of the reminder variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "reminder" => $reminder
        );

        $this->setUrl("reminders.info", $arguments);

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

        return json_encode($response->{'reminder'});
    }



    
    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function list() {

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

        $this->setUrl("reminders.list");

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

        return json_encode($response->{'reminders'});
    }
}
