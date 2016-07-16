<?php

namespace App\Scraper\AppliancesDelivered;

use App\Scraper\Page;
use DOMAttr;
use QueryPath;

class AppliancesDeliveredProductsPage extends Page
{
    /**
     * Product images xpath.
     *
     * @var string
     */
    private static $productsImageLinkXpath = '//*[contains(concat(\' \', normalize-space(@class), \' \'), \' search-results-product row \') ][position() <= 10 ]/div[contains(concat(\' \', normalize-space(@class), \' \'), \' product-image \') ]/a/img/@src';

    /**
     * Details link xpath.
     *
     * @var string
     */
    private static $productsDetailsLinkXpath = '//*[contains(concat(\' \', normalize-space(@class), \' \'), \' search-results-product row \') ][position() <= 10 ]/div[contains(concat(\' \', normalize-space(@class), \' \'), \' product-description \') ]//h4/a/@href';

    /**
     * Products title xpath.
     * @var string
     */
    private static $productsTitleXpath = '//*[contains(concat(\' \', normalize-space(@class), \' \'), \' search-results-product row \') ][position() <= 10 ]/div[contains(concat(\' \', normalize-space(@class), \' \'), \' product-description \') ]//h4/a';

    /**
     * Products price xpath.
     *
     * @var string
     */
    private static $productsPriceXpath = '//*[contains(concat(\' \', normalize-space(@class), \' \'), \' search-results-product row \') ][position() <= 10 ]/div[contains(concat(\' \', normalize-space(@class), \' \'), \' product-description \') ]//h3';

    /**
     * QueryPath native parser.
     *
     * @var QueryPath
     */
    private $parser;

    /**
     * AppliancesDeliveredProductsPage constructor.
     *
     * @param string $uri page uri
     * @param string $content full page content
     */
    public function __construct($uri = null, $content = null)
    {
        parent::__construct($uri, $content);
        $this->parser = htmlqp($this->getContent());
    }

    /**
     * Extracts ten products and allocate it in an associative array.
     * @return array extracted products matrix
     */
    public function extractProducts()
    {
        $imageLinks = $this->extractImageUrls();
        $detailLinks = $this->extractDetailsLink();
        $titles = $this->extractTitles();
        $prices = $this->extractPrices();

        $results = array();

        for ($i = 0; $i < 10; $i++) {
            $product = array();

            if (count($imageLinks) > $i) {
                $product['imageLink'] = $imageLinks[$i];
            }
            if (count($detailLinks) > $i) {
                $product['detailLink'] = $detailLinks[$i];
            }
            if (count($titles) > $i) {
                $product['title'] = $titles[$i];
            }
            if (count($prices) > $i) {
                $product['price'] = $prices[$i];
            }

            array_push($results, $product);
        }

        return $results;
    }

    /**
     * Extracts an array of ten product image urls.
     *
     * @return array an array of ten product image urls
     */
    public function extractImageUrls()
    {
        $imageLinks = $this->parser->xpath($this::$productsImageLinkXpath);
        return $this->nodesToArray($imageLinks);
    }

    /**
     * Adapt an array of native Dom elements to an array of plain strings.
     *
     * @param $nodes mixed array of native Dom elements
     * @return array an array of plain strings
     */
    private function nodesToArray($nodes)
    {
        $results = array();

        $nodes->each(function ($index, $item) use (&$results) {

            if ($item instanceof DOMAttr) {
                $results[$index] = $item->value;
            } else {
                $results[$index] = $item->nodeValue;
            }

            return true;
        });

        return $results;
    }

    /**
     * Extracts an array of ten product detail urls.
     *
     * @return array an array of ten product detail urls
     */
    public function extractDetailsLink()
    {
        $detailLinks = $this->parser->xpath($this::$productsDetailsLinkXpath);
        return $this->nodesToArray($detailLinks);
    }

    /**
     * Extracts an array of ten product titles.
     *
     * @return array an array of ten product titles
     */
    public function extractTitles()
    {
        $title = $this->parser->xpath($this::$productsTitleXpath);
        return $this->nodesToArray($title);
    }

    /**
     * Extracts an array of ten product prices.
     *
     * @return array an array of ten product prices
     */
    public function extractPrices()
    {
        $prices = $this->parser->xpath($this::$productsPriceXpath);
        return $this->nodesToArray($prices);
    }
}