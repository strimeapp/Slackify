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

class UserGroups extends AbstractApi
{
    /**
     * {@inheritdoc}
     *
     * @param  string $name
     * @param  string $handle
     * @param  string $description
     * @param  string $channels
     * @param  bool $include_count
     * @return string
     */
    public function create($name, $handle = NULL, $description = NULL, $channels = NULL, $include_count = NULL) {

        // Check if the type of the variables is valid.
        if (!is_string($name) || ($name == NULL)) {
            throw new InvalidArgumentException("The type of the name variable is not valid.");
        }
        if (!is_string($handle) &&  ($name != NULL)) {
            throw new InvalidArgumentException("The type of the handle variable is not valid.");
        }
        if (!is_string($description) &&  ($description != NULL)) {
            throw new InvalidArgumentException("The type of the description variable is not valid.");
        }
        if (!is_string($channels) &&  ($channels != NULL)) {
            throw new InvalidArgumentException("The type of the channels variable is not valid.");
        }
        if (!is_bool($include_count) &&  ($include_count != NULL)) {
            throw new InvalidArgumentException("The type of the channels variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "name" => $name
        );

        if ($handle != NULL) {
            $arguments["handle"] = $handle;
        }
        if ($description != NULL) {
            $arguments["description"] = $description;
        }
        if ($channels != NULL) {
            $arguments["channels"] = $channels;
        }
        if ($include_count != NULL) {
            $arguments["include_count"] = $include_count;
        }

        $this->setUrl("usergroups.create", $arguments);

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
     * @param  string $usergroup
     * @param  bool $include_count
     * @return string
     */
    public function disable($usergroup, $include_count = NULL) {

        // Check if the type of the variables is valid.
        if (!is_string($usergroup) || ($usergroup != NULL)) {
            throw new InvalidArgumentException("The type of the usergroup variable is not valid.");
        }
        if (!is_bool($include_count) &&  ($include_count != NULL)) {
            throw new InvalidArgumentException("The type of the include_count variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "usergroup" => $usergroup
        );

        if ($include_count != NULL) {
            $arguments["include_count"] = $include_count;
        }

        $this->setUrl("usergroups.disable", $arguments);

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
     * @param  string $usergroup
     * @param  bool $include_count
     * @return string
     */
    public function enable($usergroup, $include_count = NULL) {

        // Check if the type of the variables is valid.
        if (!is_string($usergroup) || ($usergroup != NULL)) {
            throw new InvalidArgumentException("The type of the usergroup variable is not valid.");
        }
        if (!is_bool($include_count) &&  ($include_count != NULL)) {
            throw new InvalidArgumentException("The type of the include_count variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "usergroup" => $usergroup
        );

        if ($include_count != NULL) {
            $arguments["include_count"] = $include_count;
        }

        $this->setUrl("usergroups.enable", $arguments);

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
     * @param  bool $include_disabled
     * @param  bool $include_count
     * @param  bool $include_users
     * @return string
     */
    public function list($include_disabled = NULL, $include_count = NULL, $include_users = NULL) {

        // Check if the type of the variables is valid.
        if (!is_bool($include_disabled) &&  ($include_disabled != NULL)) {
            throw new InvalidArgumentException("The type of the include_disabled variable is not valid.");
        }
        if (!is_bool($include_count) &&  ($include_count != NULL)) {
            throw new InvalidArgumentException("The type of the include_count variable is not valid.");
        }
        if (!is_bool($include_users) &&  ($include_users != NULL)) {
            throw new InvalidArgumentException("The type of the include_users variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array();

        if ($include_disabled != NULL) {
            $arguments["include_disabled"] = $include_disabled;
        }
        if ($include_count != NULL) {
            $arguments["include_count"] = $include_count;
        }
        if ($include_users != NULL) {
            $arguments["include_users"] = $include_users;
        }

        $this->setUrl("usergroups.list", $arguments);

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
     * @param  string $usergroup
     * @param  string $name
     * @param  string $handle
     * @param  string $description
     * @param  string $channels
     * @param  bool $include_count
     * @return string
     */
    public function update($usergroup, $name = NULL, $handle = NULL, $description = NULL, $channels = NULL, $include_count = NULL) {

        // Check if the type of the variables is valid.
        if (!is_string($usergroup) || ($usergroup == NULL)) {
            throw new InvalidArgumentException("The type of the usergroup variable is not valid.");
        }
        if (!is_string($name) && ($name != NULL)) {
            throw new InvalidArgumentException("The type of the name variable is not valid.");
        }
        if (!is_string($handle) &&  ($name != NULL)) {
            throw new InvalidArgumentException("The type of the handle variable is not valid.");
        }
        if (!is_string($description) &&  ($description != NULL)) {
            throw new InvalidArgumentException("The type of the description variable is not valid.");
        }
        if (!is_string($channels) &&  ($channels != NULL)) {
            throw new InvalidArgumentException("The type of the channels variable is not valid.");
        }
        if (!is_bool($include_count) &&  ($include_count != NULL)) {
            throw new InvalidArgumentException("The type of the include_count variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "usergroup" => $usergroup
        );

        if ($name != NULL) {
            $arguments["name"] = $name;
        }
        if ($handle != NULL) {
            $arguments["handle"] = $handle;
        }
        if ($description != NULL) {
            $arguments["description"] = $description;
        }
        if ($channels != NULL) {
            $arguments["channels"] = $channels;
        }
        if ($include_count != NULL) {
            $arguments["include_count"] = $include_count;
        }

        $this->setUrl("usergroups.update", $arguments);

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
     * @param  string $usergroup
     * @param  bool $include_disabled
     * @return string
     */
    public function usersList($usergroup, $include_disabled = NULL) {

        // Check if the type of the variables is valid.
        if (!is_string($usergroup) || ($usergroup == NULL)) {
            throw new InvalidArgumentException("The type of the usergroup variable is not valid.");
        }
        if (!is_bool($include_disabled) &&  ($include_disabled != NULL)) {
            throw new InvalidArgumentException("The type of the include_disabled variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "usergroup" => $usergroup
        );

        if ($include_disabled != NULL) {
            $arguments["include_disabled"] = $include_disabled;
        }

        $this->setUrl("usergroups.users.list", $arguments);

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
     * @param  string $usergroup
     * @param  string $users
     * @param  bool $include_count
     * @return string
     */
    public function usersUpdate($usergroup, $users, $include_disabled = NULL) {

        // Check if the type of the variables is valid.
        if (!is_string($usergroup) || ($usergroup == NULL)) {
            throw new InvalidArgumentException("The type of the usergroup variable is not valid.");
        }
        if (!is_string($users) || ($users == NULL)) {
            throw new InvalidArgumentException("The type of the users variable is not valid.");
        }
        if (!is_bool($include_count) &&  ($include_count != NULL)) {
            throw new InvalidArgumentException("The type of the include_count variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "usergroup" => $usergroup,
            "users" => $users
        );

        if ($include_count != NULL) {
            $arguments["include_count"] = $include_count;
        }

        $this->setUrl("usergroups.users.update", $arguments);

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
