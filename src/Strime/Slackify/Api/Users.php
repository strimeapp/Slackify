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

class Users extends AbstractApi
{
    /**
     * {@inheritdoc}
     *
     * @return Users
     */
    public function deletePhoto() {

        $this->setUrl("users.deletePhoto");

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
     * @return string
     */
    public function getPresence($user) {

        // Check if the type of the variables is valid.
        if (!is_string($user) || ($user != NULL)) {
            throw new InvalidArgumentException("The type of the user variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "user" => $user
        );

        $this->setUrl("users.getPresence", $arguments);

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
     * @return string
     */
    public function identity() {

        $this->setUrl("users.identity", $arguments);

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
     * @return string
     */
    public function info($user) {

        // Check if the type of the variables is valid.
        if (!is_bool($user) || ($user == NULL)) {
            throw new InvalidArgumentException("The type of the user variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "user" => $users
        );

        $this->setUrl("users.info", $arguments);

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
     * @param  bool $presence
     * @return string
     */
    public function list($presence = NULL) {

        // Check if the type of the variables is valid.
        if (!is_string($presence) && ($presence != NULL)) {
            throw new InvalidArgumentException("The type of the presence variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array();

        if ($presence != NULL) {
            $arguments["presence"] = $presence;
        }

        $this->setUrl("users.list", $arguments);

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
     * @return Users
     */
    public function setActive() {

        $this->setUrl("users.setActive", $arguments);

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
     * @param  string $image
     * @param  integer $crop_x
     * @param  integer $crop_y
     * @param  integer $crop_w
     * @return Users
     */
    public function setPhoto($image, $crop_x = NULL, $crop_y = NULL, $crop_w = NULL) {

        // Check if the type of the variables is valid.
        if (!is_string($image) || ($image == NULL)) {
            throw new InvalidArgumentException("The type of the image variable is not valid.");
        }
        if (!is_string($crop_x) && ($crop_x != NULL)) {
            throw new InvalidArgumentException("The type of the crop_x variable is not valid.");
        }
        if (!is_string($crop_y) && ($crop_y != NULL)) {
            throw new InvalidArgumentException("The type of the crop_y variable is not valid.");
        }
        if (!is_string($crop_w) && ($crop_w != NULL)) {
            throw new InvalidArgumentException("The type of the crop_w variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            array(
                "name" => "file",
                "contents" => fopen($video, "r"),
                "filename" => $image
            )
        );

        if ($crop_x != NULL) {
            $arguments[] = array("name" => "crop_x", "content" => $crop_x);
        }
        if ($crop_y != NULL) {
            $arguments[] = array("name" => "crop_y", "content" => $crop_y);
        }
        if ($crop_w != NULL) {
            $arguments[] = array("name" => "crop_w", "content" => $crop_w);
        }

        $this->setUrl("users.setPhoto");

        // Send the request
        try {
            $client = new \GuzzleHttp\Client();
            $json_response = $client->request('POST', $this->getUrl(), [
                'http_errors' => false,
                'multipart' => $arguments
            ]);
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
     * @param  string $presence
     * @return Users
     */
    public function setPresence($presence) {

        // Check if the type of the variables is valid.
        if (!is_string($presence) || ($presence == NULL)) {
            throw new InvalidArgumentException("The type of the presence variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "presence" => $presence
        );

        $this->setUrl("users.setPresence", $arguments);

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
