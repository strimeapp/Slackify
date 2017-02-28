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

class Bots extends AbstractApi
{
    /**
     * {@inheritdoc}
     *
     * @param  string $bot
     * @return Bots
     */
    public function info($bot = NULL) {

        // Check if the type of the variables is valid.
        if (!is_string($bot)) {
            throw new InvalidArgumentException("The type of the bot variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "bot" => $bot
        );

        $this->setUrl("bots.info", $arguments);

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
