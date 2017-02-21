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

class UsersProfile extends AbstractApi
{
    /**
     * {@inheritdoc}
     *
     * @param  string $user
     * @param  bool $include_labels
     * @return string
     */
    public function get($user = NULL, $include_labels = NULL) {

        // Check if the type of the variables is valid.
        if (!is_string($user) && ($user != NULL)) {
            throw new InvalidArgumentException("The type of the user variable is not valid.");
        }
        if (!is_string($include_labels) && ($include_labels != NULL)) {
            throw new InvalidArgumentException("The type of the include_labels variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array();

        if ($user != NULL) {
            $arguments["user"] = $user;
        }
        if ($include_labels != NULL) {
            $arguments["include_labels"] = $include_labels;
        }

        $this->setUrl("users.profile.get", $arguments);

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
     * @param  string $profile
     * @param  string $name
     * @param  string $value
     * @return string
     */
    public function set($user = NULL, $profile = NULL, $name = NULL, $value = NULL) {

        // Check if the type of the variables is valid.
        if (!is_string($user) && ($user != NULL)) {
            throw new InvalidArgumentException("The type of the user variable is not valid.");
        }
        if (!is_string($profile) && ($profile != NULL)) {
            throw new InvalidArgumentException("The type of the profile variable is not valid.");
        }
        if (!is_string($name) && ($name != NULL)) {
            throw new InvalidArgumentException("The type of the name variable is not valid.");
        }
        if (!is_string($value) && ($value != NULL)) {
            throw new InvalidArgumentException("The type of the value variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array();

        if ($user != NULL) {
            $arguments["user"] = $user;
        }
        if ($profile != NULL) {
            $arguments["profile"] = $profile;
        }
        if ($name != NULL) {
            $arguments["name"] = $name;
        }
        if ($value != NULL) {
            $arguments["value"] = $value;
        }

        $this->setUrl("users.profile.set", $arguments);

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
