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

class Rtm extends AbstractApi
{
    /**
     * {@inheritdoc}
     *
     * @param  bool $simple_latest
     * @param  bool $no_unreads
     * @param  bool $mpim_aware
     * @return Reminders
     */
    public function start($simple_latest = NULL, $no_unreads = NULL, $mpim_aware = NULL) {

        // Check if the type of the variables is valid.
        if (($simple_latest != NULL) && !is_bool($simple_latest)) {
            throw new InvalidArgumentException("The type of the simple_latest variable is not valid.");
        }
        if (($no_unreads != NULL) && !is_bool($no_unreads)) {
            throw new InvalidArgumentException("The type of the no_unreads variable is not valid.");
        }
        if (($mpim_aware != NULL) && !is_bool($mpim_aware)) {
            throw new InvalidArgumentException("The type of the mpim_aware variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array();

        if ($simple_latest != NULL) {
            $arguments["simple_latest"] = $simple_latest;
        }
        if ($no_unreads != NULL) {
            $arguments["no_unreads"] = $no_unreads;
        }
        if ($mpim_aware != NULL) {
            $arguments["mpim_aware"] = $mpim_aware;
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

        return $json_response->getBody();
    }
}
