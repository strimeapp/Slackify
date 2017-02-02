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

class Api extends AbstractApi
{
    /**
     * {@inheritdoc}
     *
     * @param  string $error
     * @param  string $foo
     * @return Api
     */
    public function test($error = NULL, $foo = NULL) {

        // Check if the type of the variables is valid.
        if (($error != NULL) && !is_string($error)) {
            throw new InvalidArgumentException("The type of the error variable is not valid.");
        }
        if (($foo != NULL) && !is_string($foo)) {
            throw new InvalidArgumentException("The type of the foo variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array();

        if($error != NULL) {
            $arguments["error"] = $error;
        }
        if($foo != NULL) {
            $arguments["foo"] = $foo;
        }

        $this->setUrl("api.test", $arguments);

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
