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

class Files extends AbstractApi
{
    /**
     * {@inheritdoc}
     *
     * @param  string $file
     * @return Files
     */
    public function delete($file) {

        // Check if the type of the variables is valid.
        if (!is_string($file)) {
            throw new InvalidArgumentException("The type of the file variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "file" => $file
        );

        $this->setUrl("files.delete", $arguments);

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

        return $this;
    }



    /**
     * {@inheritdoc}
     *
     * @param  string $file
     * @param  integer $count
     * @param  integer $page
     * @return Files
     */
    public function info($file, $count = 100, $page = 1) {

        // Check if the type of the variables is valid.
        if (!is_string($file)) {
            throw new InvalidArgumentException("The type of the file variable is not valid.");
        }
        if (!is_integer($count)) {
            throw new InvalidArgumentException("The type of the count variable is not valid.");
        }
        if (!is_integer($page)) {
            throw new InvalidArgumentException("The type of the page variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "file" => $file,
            "count" => $count,
            "page" => $page
        );

        $this->setUrl("files.info", $arguments);

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

        return $this;
    }



    /**
     * {@inheritdoc}
     *
     * @param  string $user
     * @param  string $channel
     * @param  string $ts_from
     * @param  string $ts_to
     * @param  string $types
     * @param  integer $count
     * @param  integer $page
     * @return Files
     */
    public function list($user = NULL, $channel = NULL, $ts_from = "now", $ts_to = "all", $types = "all", $count = 100, $page = 1) {

        // Check if the type of the variables is valid.
        if (($user != NULL) && !is_string($user)) {
            throw new InvalidArgumentException("The type of the user variable is not valid.");
        }
        if (($channel != NULL) && !is_string($channel)) {
            throw new InvalidArgumentException("The type of the channel variable is not valid.");
        }
        if (!is_string($ts_from)) {
            throw new InvalidArgumentException("The type of the ts_from variable is not valid.");
        }
        if (!is_string($ts_to)) {
            throw new InvalidArgumentException("The type of the ts_to variable is not valid.");
        }
        if (!is_string($types)) {
            throw new InvalidArgumentException("The type of the types variable is not valid.");
        }
        if (!is_integer($count)) {
            throw new InvalidArgumentException("The type of the count variable is not valid.");
        }
        if (!is_integer($page)) {
            throw new InvalidArgumentException("The type of the page variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "ts_from" => $ts_from,
            "ts_to" => $ts_to,
            "types" => $types,
            "count" => $count,
            "page" => $page
        );

        if ($user != NULL) {
            $arguments["user"] = $user;
        }
        if ($channel != NULL) {
            $arguments["channel"] = $channel;
        }

        $this->setUrl("files.list", $arguments);

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

        return $this;
    }



    /**
     * {@inheritdoc}
     *
     * @param  string $file
     * @return Files
     */
    public function revokePublicURL($file) {

        // Check if the type of the variables is valid.
        if (!is_string($file)) {
            throw new InvalidArgumentException("The type of the file variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "file" => $file
        );

        $this->setUrl("files.revokePublicURL", $arguments);

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

        return $this;
    }


    
    /**
     * {@inheritdoc}
     *
     * @param  string $file
     * @return Files
     */
    public function sharedPublicURL($file) {

        // Check if the type of the variables is valid.
        if (!is_string($file)) {
            throw new InvalidArgumentException("The type of the file variable is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "file" => $file
        );

        $this->setUrl("files.sharedPublicURL", $arguments);

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

        return $this;
    }


    
    /**
     * {@inheritdoc}
     *
     * @param  string $filename
     * @param  string $path_to_file
     * @param  string $filetype
     * @param  string $title
     * @param  string $initial_comment
     * @param  string $channels
     * @return Files
     */
    public function upload($filename, $path_to_file = NULL, $filetype = NULL, $title = NULL, 
        $initial_comment = NULL, $channels = NULL) {

        // Check if the type of the variables is valid.
        if (!is_string($filename)) {
            throw new InvalidArgumentException("The type of the filename variable is not valid.");
        }
        if (($path_to_file != NULL) && !is_string($path_to_file)) {
            throw new InvalidArgumentException("The type of the path_to_file variable is not valid.");
        }
        if (($filetype != NULL) && !is_string($filetype)) {
            throw new InvalidArgumentException("The type of the filetype variable is not valid.");
        }
        if (($title != NULL) && !is_string($title)) {
            throw new InvalidArgumentException("The type of the title variable is not valid.");
        }
        if (($initial_comment != NULL) && !is_string($initial_comment)) {
            throw new InvalidArgumentException("The type of the initial_comment variable is not valid.");
        }
        if (($channels != NULL) && !is_string($channels)) {
            throw new InvalidArgumentException("The type of the channels variable is not valid.");
        }

        // Get the content of the file
        if(file_exists( $path_to_file )) {
            $content = file_get_contents( $path_to_file );
        }
        else {
            throw new RuntimeException("The path to the file is not valid.");
        }

        // Set the arguments of the request
        $arguments = array(
            "filename" => $filename,
            "filetype" => $filetype,
            "title" => $title,
            "initial_comment" => $initial_comment,
            "channels" => $channels
        );

        $post_content = array(
            "content" => $content
        );

        $this->setUrl("files.upload", $arguments);

        // Send the request
        try {
            $client = new \GuzzleHttp\Client();
            $json_response = $client->request('POST', $this->getUrl(), [
                'headers' => $headers,
                'http_errors' => false,
                'json' => $post_content
            ]);
            $response = json_decode( $json_response->getBody() );
        }
        catch (RequestException $e) {
            throw new RuntimeException('The request to the API failed: '.$e->getMessage(), $e->getCode(), $e);
        }

        if($response->{'ok'} === FALSE) {
            throw new RuntimeException('The request to the API failed: '.$response->{'error'}.".");
        }

        return $this;
    }
}
