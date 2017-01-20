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
    public function setUrl($method, $arguments) {

        if (!is_string($method)) {
            throw new InvalidArgumentException('The method variable must be a string.');
        }
        if (!is_array($arguments)) {
            throw new InvalidArgumentException('The arguments variable must be an array.');
        }

        // Set a new array
        $arguments_list = array();

        foreach ($arguments as $key => $value) {
            $arguments_list[] = $key . "=" . $value;
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
