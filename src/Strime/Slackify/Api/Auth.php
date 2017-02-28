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

class Auth extends AbstractApi
{
    /**
     * {@inheritdoc}
     *
     * @param  string $token
     * @param  boolean $test
     * @return Auth
     */
    public function revoke($token = NULL, $test = FALSE) {

        // Check if the type of the variables is valid.
        if (($token != NULL) && !is_string($token)) {
            throw new InvalidArgumentException("The type of the token variable is not valid.");
        }
        if (!is_bool($test)) {
            throw new InvalidArgumentException("The type of the test variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "test" => $test
        );

        if($token != NULL) {
            $arguments["token"] = $token;
        }

        $this->setUrl("auth.revoke", $arguments);

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
     * @return Auth
     */
    public function test() {

        $this->setUrl("auth.test");

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
