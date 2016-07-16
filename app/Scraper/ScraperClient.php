<?php

namespace App\Scraper;

use App\Scraper\Exception\ConnectionException;
use App\Scraper\Exception\RequestException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;

class ScraperClient implements ScraperClientInterface
{

    /**
     * Guzzle native client.
     *
     * @var Client
     */
    private $client;

    /**
     * ScraperClient constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @inheritdoc
     */
    public function getPage($uri)
    {
        return new Page($uri, $this->getRemoteContent($uri));
    }

    /**
     * Retrieves remote content if it is available.
     *
     * @param $uri
     * @return string
     *
     * @throws RequestException
     * @throws ConnectionException
     */
    private function getRemoteContent($uri)
    {
        try {
            $response = $this->client->request('GET', $uri);

            $statusCode = $response->getStatusCode();

            if (floor($statusCode / 100) != 2) {
                throw RequestException::create($uri, $statusCode, $response->getReasonPhrase());
            }

            return (string)$response->getBody();

        } catch (ConnectException $ex) {
            throw new ConnectionException('There was a problem trying to connect to remote host', $ex);
        } catch (\GuzzleHttp\Exception\RequestException $ex) {
            throw RequestException::create($uri, $ex->getCode(), $ex->getResponse() != null ? $ex->getResponse()->getReasonPhrase() : null);
        }
    }
}