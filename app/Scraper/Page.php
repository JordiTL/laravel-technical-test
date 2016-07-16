<?php

namespace App\Scraper;

class Page implements PageInterface
{

    /**
     * Page uri.
     *
     * @var string
     */
    private $uri;

    /**
     * Page full content.
     *
     * @var string
     */
    private $content;

    /**
     * Page constructor.
     * @param string $uri page uri
     * @param string $content page full content
     */
    public function __construct($uri = null, $content = null)
    {
        $this->uri = $uri;
        $this->content = $content;
    }

    /**
     * @inheritdoc
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @inheritdoc
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @inheritdoc
     */
    public function extract($xpath)
    {
        $parser = htmlqp($this->content);
        $data = (string)$parser->xpath($xpath)->text();

        return $data;
    }
}