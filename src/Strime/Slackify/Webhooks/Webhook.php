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
    const SLACK_VALID_VALUES = "message,channel,link,link_text,icon,username";
    const SLACK_VALID_ATTACHMENTS = "fallback,text,pretext,color,fields,author,author_link,title,title_link,image_url,thumb_url,footer,footer_icon,ts";


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
    public function getUrl() {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return WebhooksInterface
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
     * @param  array $values
     * @return Webhook
     */
    public function sendMessage($values) {

        // Parse the values to make sure they are valid
        foreach ($values as $key => $value) {
            
            // Create an array with the valid values
            $valid_values = explode(",", self::SLACK_VALID_VALUES);

            if (!in_array($key, $valid_values)) {
                unset($values[$key]);
            }
            else {
                if (!is_string($value)) {
                    throw new InvalidArgumentException("The  " . $key . " value must be a string.");
                }
            }
        }

        // Check if a message has been defined
        if (!isset($values["message"])) {
            throw new InvalidArgumentException("The message value is missing.");
        }

        // Encode the message
        $values["message"] = str_replace('&', '&amp;', $values["message"]);
        $values["message"] = str_replace('<', '&lt;', $values["message"]);
        $values["message"] = str_replace('>', '&gt;', $values["message"]);

        // Add the link to the message if needed.
        if (isset($values["link"]) && ($values["link"] !== NULL)) {
            $values["message"] .= "\n";
            $values["message"] .= "<" . $values["link"]; 
            if(isset($values["link_text"]) && ($values["link_text"] !== NULL)) {
                $values["message"] .= "|" . $values["link_text"];
            }
            $values["message"] .= ">" ;
        }

        // Set the parameters for the request
        $params = array(
            "text" => $values["message"]
        );

        if (isset($values["channel"]) && ($values["channel"] !== NULL)) {
            $params["channel"] = $values["channel"];
        }

        if (isset($values["icon"]) && ($values["icon"] !== NULL)) {

            // The icon may either be a URL or an emoji
            // We need to check the form of the string to know which parameter to choose.
            $icon_type = NULL;

            if ((strcmp(substr($values["icon"], 0, 1), ":") == 0) && (strcmp(substr($values["icon"], -1), ":") == 0)) {
                $icon_type = "emoji";
            }
            else {
                $icon_type = "url";
            }

            if ($icon_type != NULL)
                $params["icon_" . $icon_type] = $values["icon"];
        }

        if (isset($values["username"]) && ($values["username"] !== NULL)) {
            $params["username"] = $values["username"];
        }

        // Check if there are attachments to add to the request
        if (is_array($this->attachments) && (count($this->attachments) > 0)) {
            $params["attachments"] = $this->attachments;
        }

        // Send the request
        try {
            $client = new \GuzzleHttp\Client();
            $json_response = $client->request('POST', $this->url, [
                'body' => $params
            ]);
        }
        catch(RequestException $e) {
            throw new RuntimeException('The request to the webhook failed: '.$e->getMessage(), $e->getCode(), $e);
        }

        // We re-initialize the attachments to prevent any conflict with a future message.
        $this->attachments = array();

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
        foreach ($attachments as $attachment) {
            foreach ($attachment as $key => $value) {
            
                // Create an array with the valid values
                $valid_values = explode(",", self::SLACK_VALID_ATTACHMENTS);

                if(!in_array($key, $valid_values)) {
                    unset($attachment[$key]);
                }
            }

            // Check if a message has been defined
            if(!isset($attachment["fallback"], $attachment["fields"], $attachment["fields"]["title"])) {
                throw new InvalidArgumentException("Attachment fields are missing.");
            }
        }

        $this->attachments = $attachments;

        return $this;
    }
}
