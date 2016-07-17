<?php

namespace App\Scraper\Exception;


class ConnectionException extends RequestException
{
    /**
     * ConnectionException constructor.
     *
     * @param string $message reason message
     * @param \Exception|null $previous parent exception
     */
    public function __construct($message, \Exception $previous = null)
    {
        parent::__construct($message, null, $previous);
    }
}