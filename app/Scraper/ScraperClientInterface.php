<?php

namespace App\Scraper;


interface ScraperClientInterface
{
    /**
     * Get associated page for given target uri.
     *
     * @param string $uri target uri
     *
     * @return Page $page associated page
     */
    public function getPage($uri);
}