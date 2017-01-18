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

class Webhook extends AbstractWebhook
{
    const SLACK_VALID_VALUES = array("message", "channel", "link", "link_text", "icon", "username");
    const SLACK_VALID_ATTACHMENTS = array("fallback", "text", "pretext", "color");
    const SLACK_VALID_ATTACHMENTS_FIELDS = array("title", "value", "short");


    /** @var string */
    protected $url;
    /** @var array */
    protected $attachments;


    public function __construct($url) {
        $this->url = $url;
        $this->attachments = array();
    }


    
    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return WebhooksInterface
     */
    public function setUrl($url)
    {
        if (!is_string($url)) {
            throw new InvalidArgumentException('The URL must be a string.');
        }

        $this->url = $url;

        return $this;
    }


    /**
     * {@inheritdoc}
     *
     * @param  array $values
     * @return Webhook
     */
    public function sendMessage($message, $channel = NULL, $link = NULL, $link_text = NULL, $icon = NULL, $username = NULL)
    {
        // Parse the values to make sure they are valid
        foreach ($values as $key => $value) {
            if(!in_array($key, SLACK_VALID_VALUES)) {
                unset($values[$key]);
            }
            else {
                switch ($key) {
                    default:
                        if (!is_string($value)) {
                            throw new InvalidArgumentException("The  " . $key . " value must be a string.");
                        }
                        break;
                }
            }
        }

        // Check if a message has been defined
        if(!isset($values["message"])) {
            throw new InvalidArgumentException("The message value is missing.");
        }

        // Encode the message
        $message = str_replace('&', '&amp;', $message);
        $message = str_replace('<', '&lt;', $message);
        $message = str_replace('>', '&gt;', $message);

        // Add the link to the message if needed.
        if(isset($values["link"]) && ($values["link"] !== NULL)) {
            $values["message"] .= "\n";
            $values["message"] .=  "<" . $values["link"]; 
            if(isset($values["link_text"]) && ($values["link_text"] !== NULL)) {
                $values["message"] .=  "|" . $values["link_text"];
            }
            $values["message"] .=  ">" ;
        }

        // Set the parameters for the request
        $params = array(
            "text" => $values["message"]
        );

        if(isset($values["channel"]) && ($values["channel"] !== NULL)) {
            $params["channel"] = $values["channel"];
        }

        if(isset($values["icon"]) && ($values["icon"] !== NULL)) {

            // The icon may either be a URL or an emoji
            // We need to check the form of the string to know which parameter to choose.
            $icon_type = NULL;

            if((strcmp(substr($values["icon"], 0, 1), ":") == 0) && (strcmp(substr($values["icon"], -1), ":") == 0)) {
                $icon_type = "emoji";
            }
            else {
                $icon_type = "url";
            }

            $params["icon_".$icon_type] = $values["icon"];
        }

        if(isset($values["username"]) && ($values["username"] !== NULL)) {
            $params["username"] = $values["username"];
        }

        // Check if there are attachments to add to the request
        if(is_array($this->attachments) && (count($this->attachments) > 0)) {
            $params["attachments"] = $this->attachments;
        }

        // Send the request
        try {
            $client = new \GuzzleHttp\Client();
            $json_response = $client->request('POST', $this->url, [
                'body' => json_encode( $params )
            ]);
            $curl_status = $json_response->getStatusCode();
            $response = json_decode( $json_response->getBody() );
        }
        catch(RequestException $e) {
            throw new RuntimeException('The request to the webhook failed: '.$e->getRequest(), $e->getCode(), $e);
        }

        return $this;
    }



    /**
     * {@inheritdoc}
     *
     * @param  array $attachments
     * @return Webhook
     */
    public function setAttachments($attachments)
    {
        if (!is_array($attachments)) {
            throw new InvalidArgumentException('The attachments must be an array.');
        }

        // Browse the attachments to see if the key is valid.
        foreach ($attachments as $key => $value) {
            if(in_array($key, SLACK_VALID_ATTACHMENTS)) {
                unset($attachments[$key]);
            }
        }

        // Check if a message has been defined
        if(!isset($values["fallback"], $values["fields"], $values["fields"]["title"])) {
            throw new InvalidArgumentException("Attachment fields are missing.");
        }

        $this->attachments = $attachments;

        return $this;
    }
}