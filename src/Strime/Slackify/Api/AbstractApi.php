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

abstract class AbstractApi implements ApiInterface
{
    const SLACK_API_URL = "https://slack.com/api/";


    /** @var string */
    protected $token;
    /** @var string */
    public $url;


    public function __construct($token) {
        $this->token = $token;
    }



    /**
     * @return string
     */
    public function getToken() {
        return $this->token;
    }

    /**
     * @param string $token
     *
     * @return ApiInterface
     */
    public function setToken($token) {

        if (!is_string($token)) {
            throw new InvalidArgumentException('The token must be a string.');
        }

        $this->token = $token;

        return $this;
    }

    /**
     * @param string $method
     * @param array $arguments
     *
     * @return ApiInterface
     */
    public function setUrl($method, $arguments = NULL) {

        if (!is_string($method)) {
            throw new InvalidArgumentException('The method variable must be a string.');
        }
        if (($arguments != NULL) && !is_array($arguments)) {
            throw new InvalidArgumentException('The arguments variable must be an array.');
        }

        // Set a new array
        $arguments_list = array();

        // Check if a token is set through the arguments
        $token_is_set = FALSE;

        if ($arguments != NULL) {
            foreach ($arguments as $key => $value) {
                $arguments_list[] = $key . "=" . $value;

                if(strcmp($key, "token") == 0) {
                    $token_is_set = TRUE;
                }
            }
        }

        // If the token has not been set, add it to the list
        if(!$token_is_set && isset($this->token) && is_string($this->token)) {
            $arguments_list[] = "token=".$this->token;
        }

        $this->url = self::SLACK_API_URL . $method . "?" . implode("&", $arguments_list);

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

}
