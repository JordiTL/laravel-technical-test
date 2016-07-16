<?php

namespace App\Scraper\Exception;


class RequestException extends \RuntimeException
{
    /**
     * RequestException constructor.
     *
     * @param string $message reason message
     * @param int $code http status code
     * @param \Exception|null $previous parent exception
     */
    public function __construct($message, $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Factory method to create a new exception with a normalized error message
     *
     * @param string $uri page uri
     * @param int $code http status code
     * @param string $reason reason message
     * @param \Exception $previous Previous exception
     * 
     * @return RequestException
     */
    public static function create(
        $uri,
        $code = 0,
        $reason = 'Unknown reason',
        \Exception $previous = null
    )
    {

        $level = floor($code / 100);
        if ($level == '4') {
            $label = 'Client error';
            $className = __NAMESPACE__ . '\\ClientException';
        } elseif ($level == '5') {
            $label = 'Server error';
            $className = __NAMESPACE__ . '\\ServerException';
        } else {
            $label = 'Unsuccessful request';
            $className = __CLASS__;
        }

        // Server Error: `GET /` resulted in a `404 Not Found` response:
        // <html> ... (truncated)
        $message = sprintf(
            '%s: `%s` resulted in a `%s` response',
            $label,
            'GET ' . $uri,
            $code . ' ' . $reason
        );

        return new $className($message, $code, $previous);
    }
}