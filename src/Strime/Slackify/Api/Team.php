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

class Team extends AbstractApi
{
    /**
     * {@inheritdoc}
     *
     * @param  string $count
     * @param  string $page
     * @param  string $before
     * @return string
     */
    public function accessLogs($count = 100, $page = 1, $before = NULL) {

        // Check if the type of the variables is valid.
        if (!is_int($count)) {
            throw new InvalidArgumentException("The type of the count variable is not valid.");
        }
        if (!is_int($page)) {
            throw new InvalidArgumentException("The type of the page variable is not valid.");
        }
        if (!is_int($before) && ($before != NULL)) {
            throw new InvalidArgumentException("The type of the before variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "count" => $count,
            "page" => $page
        );

        if ($before != NULL) {
            $arguments["before"] = $before;
        }

        $this->setUrl("team.accessLogs", $arguments);

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
    public function billableInfo($user = NULL) {

        // Check if the type of the variables is valid.
        if (!is_string($user) && ($user != NULL)) {
            throw new InvalidArgumentException("The type of the user variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array();

        if($user != NULL) {
            $arguments["user"] = $user;
        }

        $this->setUrl("team.billableInfo", $arguments);

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
    public function info() {

        $this->setUrl("team.info");

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
     * @param  string $service_id
     * @param  string $app_id
     * @param  string $user
     * @param  string $change_type
     * @param  int $count
     * @param  int $page
     * @return string
     */
    public function integrationLogs($service_id = NULL, $app_id = NULL, $user = NULL, $change_type = NULL, $count = 100, $page = 1) {

        // Check if the type of the variables is valid.
        if (!is_string($service_id) && ($service_id != NULL)) {
            throw new InvalidArgumentException("The type of the service_id variable is not valid.");
        }
        if (!is_string($app_id) && ($app_id != NULL)) {
            throw new InvalidArgumentException("The type of the app_id variable is not valid.");
        }
        if (!is_string($user) && ($user != NULL)) {
            throw new InvalidArgumentException("The type of the user variable is not valid.");
        }
        if (!is_string($change_type) && ($change_type != NULL)) {
            throw new InvalidArgumentException("The type of the change_type variable is not valid.");
        }
        if (!is_int($count)) {
            throw new InvalidArgumentException("The type of the count variable is not valid.");
        }
        if (!is_string($page)) {
            throw new InvalidArgumentException("The type of the page variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array();

        if($service_id != NULL) {
            $arguments["service_id"] = $service_id;
        }
        if($app_id != NULL) {
            $arguments["app_id"] = $app_id;
        }
        if($user != NULL) {
            $arguments["user"] = $user;
        }
        if($change_type != NULL) {
            $arguments["change_type"] = $change_type;
        }
        if($count != NULL) {
            $arguments["count"] = $count;
        }
        if($page != NULL) {
            $arguments["page"] = $page;
        }

        $this->setUrl("team.integrationLogs", $arguments);

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
     * @param  string $visibility
     * @return string
     */
    public function profileGet($visibility = NULL) {

        // Set the allowed values for the visibility parameter.
        $allowed_visibilities = array("all", "visible", "hidden");

        // Check if the type of the variables is valid.
        if (!is_string($visibility) && ($visibility != NULL) && !in_array($allowed_visibilities, $visibility)) {
            throw new InvalidArgumentException("The type of the visibility variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array();

        if ($visibility != NULL) {
            $arguments["visibility"] = $visibility;
        }

        $this->setUrl("team.profile.get", $arguments);

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
