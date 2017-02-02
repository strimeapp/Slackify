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

class Search extends AbstractApi
{
    /**
     * {@inheritdoc}
     *
     * @param  string $query
     * @param  string $sort
     * @param  string $sort_dir
     * @param  int $hightlight
     * @param  int $count
     * @param  int $page
     * @return string
     */
    public function all($query, $sort = "score", $sort_dir = "desc", $hightlight = 1, $count = 20, $page = 2) {

        // Check if the type of the variables is valid.
        if (!is_string($query)) {
            throw new InvalidArgumentException("The type of the query variable is not valid.");
        }
        if (!is_string($sort)) {
            throw new InvalidArgumentException("The type of the sort variable is not valid.");
        }
        if (!is_string($sort_dir)) {
            throw new InvalidArgumentException("The type of the sort_dir variable is not valid.");
        }
        if (!is_integer($hightlight)) {
            throw new InvalidArgumentException("The type of the hightlight variable is not valid.");
        }
        if (!is_integer($count)) {
            throw new InvalidArgumentException("The type of the count variable is not valid.");
        }
        if (!is_integer($page)) {
            throw new InvalidArgumentException("The type of the page variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "query" => $query,
            "sort" => $sort,
            "sort_dir" => $sort_dir,
            "hightlight" => $hightlight,
            "count" => $count,
            "page" => $page
        );

        $this->setUrl("search.all", $arguments);

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
     * @param  string $query
     * @param  string $sort
     * @param  string $sort_dir
     * @param  int $hightlight
     * @param  int $count
     * @param  int $page
     * @return string
     */
    public function files($query, $sort = "score", $sort_dir = "desc", $hightlight = 1, $count = 20, $page = 2) {

        // Check if the type of the variables is valid.
        if (!is_string($query)) {
            throw new InvalidArgumentException("The type of the query variable is not valid.");
        }
        if (!is_string($sort)) {
            throw new InvalidArgumentException("The type of the sort variable is not valid.");
        }
        if (!is_string($sort_dir)) {
            throw new InvalidArgumentException("The type of the sort_dir variable is not valid.");
        }
        if (!is_integer($hightlight)) {
            throw new InvalidArgumentException("The type of the hightlight variable is not valid.");
        }
        if (!is_integer($count)) {
            throw new InvalidArgumentException("The type of the count variable is not valid.");
        }
        if (!is_integer($page)) {
            throw new InvalidArgumentException("The type of the page variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "query" => $query,
            "sort" => $sort,
            "sort_dir" => $sort_dir,
            "hightlight" => $hightlight,
            "count" => $count,
            "page" => $page
        );

        $this->setUrl("search.files", $arguments);

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
     * @param  string $query
     * @param  string $sort
     * @param  string $sort_dir
     * @param  int $hightlight
     * @param  int $count
     * @param  int $page
     * @return string
     */
    public function messages($query, $sort = "score", $sort_dir = "desc", $hightlight = 1, $count = 20, $page = 2) {

        // Check if the type of the variables is valid.
        if (!is_string($query)) {
            throw new InvalidArgumentException("The type of the query variable is not valid.");
        }
        if (!is_string($sort)) {
            throw new InvalidArgumentException("The type of the sort variable is not valid.");
        }
        if (!is_string($sort_dir)) {
            throw new InvalidArgumentException("The type of the sort_dir variable is not valid.");
        }
        if (!is_integer($hightlight)) {
            throw new InvalidArgumentException("The type of the hightlight variable is not valid.");
        }
        if (!is_integer($count)) {
            throw new InvalidArgumentException("The type of the count variable is not valid.");
        }
        if (!is_integer($page)) {
            throw new InvalidArgumentException("The type of the page variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "query" => $query,
            "sort" => $sort,
            "sort_dir" => $sort_dir,
            "hightlight" => $hightlight,
            "count" => $count,
            "page" => $page
        );

        $this->setUrl("search.messages", $arguments);

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
