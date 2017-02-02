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

class Oauth extends AbstractApi
{
    /**
     * {@inheritdoc}
     *
     * @param  string $client_id
     * @param  string $client_secret
     * @param  string $code
     * @param  string $redirect_uri
     * @return string $response
     */
    public function access($client_id, $client_secret, $code, $redirect_uri = NULL) {

        // Check if the type of the variables is valid.
        if (!is_string($client_id)) {
            throw new InvalidArgumentException("The type of the client_id variable is not valid.");
        }
        if (!is_string($client_secret)) {
            throw new InvalidArgumentException("The type of the client_secret variable is not valid.");
        }
        if (!is_string($code)) {
            throw new InvalidArgumentException("The type of the code variable is not valid.");
        }
        if (($redirect_uri != NULL) && !is_string($redirect_uri)) {
            throw new InvalidArgumentException("The type of the redirect_uri variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "client_id" => $client_id,
            "client_secret" => $client_secret,
            "code" => $code
        );

        if($redirect_uri != NULL) {
            $arguments["redirect_uri"] = $redirect_uri;
        }

        $this->setUrl("oauth.access", $arguments);

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
