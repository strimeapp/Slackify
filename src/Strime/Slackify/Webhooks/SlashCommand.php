<?php

/*
 * This file is part of Slackify.
 *
 * (c) Strime <contact@strime.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Strime\Slackify\Webhooks;

use Strime\Slackify\Exception\RuntimeException;
use Strime\Slackify\Exception\InvalidArgumentException;
use GuzzleHttp\Exception\RequestException;

class SlashCommand extends AbstractSlashCommand
{
    /** @var string */
    protected $url;


    public function __construct($url) {
        $this->url = $url;
    }



    /**
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return SlashCommand
     */
    public function setUrl($url) {

        if (!is_string($url)) {
            throw new InvalidArgumentException('The URL must be a string.');
        }

        $this->url = $url;

        return $this;
    }


    /**
     * {@inheritdoc}
     *
     * @param  string $topic
     * @return SlashCommand
     */
    public function changeChannelTopic($topic) {

        // Check if a message has been defined
        if (!is_string($topic)) {
            throw new InvalidArgumentException("The type of the topic variable is not valid.");
        }

        // Set the message to send to the webhook
        $params["message"] = "/topic " . $topic;

        // Send the request
        try {
            $client = new \GuzzleHttp\Client();
            $json_response = $client->request('POST', $this->url, [
                'body' => json_encode($params)
            ]);
        }
        catch (RequestException $e) {
            throw new RuntimeException('The request to the webhook failed: '.$e->getMessage(), $e->getCode(), $e);
        }

        return $this;
    }
}
