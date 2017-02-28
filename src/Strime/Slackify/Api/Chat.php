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

class Chat extends AbstractApi
{
    /**
     * {@inheritdoc}
     *
     * @param  float $ts
     * @param  string $channel
     * @param  string $as_user
     * @return Chat
     */
    public function delete($ts, $channel, $as_user = NULL) {

        // Check if the type of the variables is valid.
        if (!is_float($ts)) {
            throw new InvalidArgumentException("The type of the ts variable is not valid.");
        }
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }
        if (($as_user != NULL) && !is_bool($as_user)) {
            throw new InvalidArgumentException("The type of the as_user variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "ts" => (string)$ts,
            "channel" => $channel
        );

        if($as_user != NULL) {
            $arguments["as_user"] = $as_user;
        }

        $this->setUrl("chat.delete", $arguments);

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
     * @param  string $channel
     * @param  string $text
     * @return Chat
     */
    public function meMessage($channel, $text) {

        // Check if the type of the variables is valid.
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }
        if (!is_string($text)) {
            throw new InvalidArgumentException("The type of the text variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "channel" => $channel,
            "text" => $text
        );

        $this->setUrl("chat.meMessage", $arguments);

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
     * @param  string $channel
     * @param  string $text
     * @param  string $parse
     * @param  integer $link_names
     * @param  string $attachments
     * @param  bool $unfurl_links
     * @param  bool $unfurl_media
     * @param  string $username
     * @param  bool $as_user
     * @param  string $icon_url
     * @param  string $icon_emoji
     * @param  float $thread_ts
     * @param  string $reply_broadcast
     * @return Chat
     */
    public function postMessage($channel, $text, $parse = "none", $link_names = 1, $attachments = NULL,
        $unfurl_links = TRUE, $unfurl_media = FALSE, $username = NULL, $as_user = TRUE, $icon_url = NULL,
        $icon_emoji = NULL, $thread_ts = NULL, $reply_broadcast = TRUE) {

        // Check if the type of the variables is valid.
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }
        if (!is_string($text)) {
            throw new InvalidArgumentException("The type of the text variable is not valid.");
        }
        if (!is_string($parse)) {
            throw new InvalidArgumentException("The type of the parse variable is not valid.");
        }
        if (!is_integer($link_names)) {
            throw new InvalidArgumentException("The type of the link_names variable is not valid.");
        }
        if (($attachments != NULL) && !is_string($attachments)) {
            throw new InvalidArgumentException("The type of the attachments variable is not valid.");
        }
        if (!is_bool($unfurl_links)) {
            throw new InvalidArgumentException("The type of the unfurl_links variable is not valid.");
        }
        if (!is_bool($unfurl_media)) {
            throw new InvalidArgumentException("The type of the unfurl_media variable is not valid.");
        }
        if (($username != NULL) && !is_string($username)) {
            throw new InvalidArgumentException("The type of the username variable is not valid.");
        }
        if (!is_bool($as_user)) {
            throw new InvalidArgumentException("The type of the as_user variable is not valid.");
        }
        if (($icon_url != NULL) && !is_string($icon_url)) {
            throw new InvalidArgumentException("The type of the icon_url variable is not valid.");
        }
        if (($icon_emoji != NULL) && !is_string($icon_emoji)) {
            throw new InvalidArgumentException("The type of the icon_emoji variable is not valid.");
        }
        if (($thread_ts != NULL) && !is_float($thread_ts)) {
            throw new InvalidArgumentException("The type of the thread_ts variable is not valid.");
        }
        if (!is_bool($reply_broadcast)) {
            throw new InvalidArgumentException("The type of the reply_broadcast variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "channel" => $channel,
            "text" => $text,
            "parse" => $parse,
            "link_names" => $link_names,
            "unfurl_links" => $unfurl_links,
            "unfurl_media" => $unfurl_media,
            "as_user" => $as_user,
            "reply_broadcast" => $reply_broadcast
        );

        if($attachments != NULL) {
            $arguments["attachments"] = $attachments;
        }
        if($username != NULL) {
            $arguments["username"] = $username;
        }
        if($icon_url != NULL) {
            $arguments["icon_url"] = $icon_url;
        }
        if($icon_emoji != NULL) {
            $arguments["icon_emoji"] = $icon_emoji;
        }
        if($thread_ts != NULL) {
            $arguments["thread_ts"] = (string)$thread_ts;
        }

        $this->setUrl("chat.postMessage", $arguments);

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
     * @param  string $channel
     * @param  string $text
     * @param  float $ts
     * @param  string $attachments
     * @param  string $parse
     * @param  integer $link_names
     * @param  bool $as_user
     * @return Chat
     */
    public function update($ts, $channel, $text, $attachments = NULL, $parse = "none", $link_names = 1, $as_user = TRUE) {

        // Check if the type of the variables is valid.
        if (!is_float($ts)) {
            throw new InvalidArgumentException("The type of the ts variable is not valid.");
        }
        if (!is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }
        if (!is_string($text)) {
            throw new InvalidArgumentException("The type of the text variable is not valid.");
        }
        if (($attachments != NULL) && !is_string($attachments)) {
            throw new InvalidArgumentException("The type of the attachments variable is not valid.");
        }
        if (!is_string($parse)) {
            throw new InvalidArgumentException("The type of the parse variable is not valid.");
        }
        if (!is_integer($link_names)) {
            throw new InvalidArgumentException("The type of the link_names variable is not valid.");
        }
        if (!is_bool($as_user)) {
            throw new InvalidArgumentException("The type of the as_user variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "ts" => (string)$ts,
            "channel" => $channel,
            "text" => $text,
            "parse" => $parse,
            "link_names" => $link_names,
            "as_user" => $as_user,
        );

        if($attachments != NULL) {
            $arguments["attachments"] = $attachments;
        }

        $this->setUrl("chat.update", $arguments);

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
