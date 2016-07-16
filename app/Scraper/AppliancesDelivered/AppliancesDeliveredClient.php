<?php
namespace App\Scraper\AppliancesDelivered;

use App\Scraper\ScraperClient;

class AppliancesDeliveredClient extends ScraperClient
{
    /**
     * Cheap products uri.
     *
     * @var string
     */
    private static $cheapProductsUri = 'https://www.appliancesdelivered.ie/search';

    /**
     * Expensive products uri.
     *
     * @var string
     */
    private static $expensiveProductsUri = 'https://www.appliancesdelivered.ie/search?sort=price_desc';

    /**
     * Get an instance of cheap products page.
     *
     * @return AppliancesDeliveredProductsPage the page of cheapest products
     */
    public function getCheapProductsPage()
    {
        return new AppliancesDeliveredProductsPage($this::$cheapProductsUri, $this->getPage($this::$cheapProductsUri)->getContent());
    }

    /**
     * Get an instance of expensive products page.
     *
     * @return AppliancesDeliveredProductsPage the page of the most expensive products
     */
    public function getExpensiveProductsPage()
    {
        return new AppliancesDeliveredProductsPage($this::$expensiveProductsUri, $this->getPage($this::$expensiveProductsUri)->getContent());
    }
}