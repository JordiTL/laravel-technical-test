<?php

namespace App\Scraper;


interface PageInterface
{
    /**
     * Get current page uri.
     *
     * @return string page uri
     */
    public function getUri();

    /**
     * Get page content.
     *
     * @return page content
     */
    public function getContent();

    /**
     * Extracts raw data in this page for provided XPath expression.
     *
     * @param string $xpath XPath expression
     *
     * @return string extracted data
     */
    public function extract($xpath);
}