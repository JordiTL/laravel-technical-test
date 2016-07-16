<?php
/**
 * Created by PhpStorm.
 * User: jtorregrosa
 * Date: 14/07/16
 * Time: 18:54
 */

namespace tests\unit\Scraper;


use App\Scraper\AppliancesDelivered\AppliancesDeliveredClient;
use App\Scraper\AppliancesDelivered\AppliancesDeliveredProductsPage;

class AppliancesDeliveredClientTest extends \PHPUnit_Framework_TestCase
{

    /** @var AppliancesDeliveredClient */
    protected static $client;

    /** @var  AppliancesDeliveredProductsPage */
    protected static $cheapProductsPage;

    /** @var  AppliancesDeliveredProductsPage */
    protected static $expensiveProductsPage;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        self::$client = new AppliancesDeliveredClient();
        self::$cheapProductsPage = self::$client->getCheapProductsPage();
        self::$expensiveProductsPage = self::$client->getExpensiveProductsPage();
    }

    /**
     * @test
     *
     * Test if a user can extract ten image urls of cheap products.
     *
     */
    public function a_user_can_extract_ten_image_urls_of_cheap_prods(){
        // Given the CheapProductsPage
        $page = self::$cheapProductsPage;

        // When extracting the ten required images
        $results = $page ->extractImageUrls();

        // Then there are ten elements in the results

        $this->assertCount(10, $results);
    }

    /**
     * @test
     *
     * Test if a user can extract ten detail links of cheap products.
     *
     */
    public function a_user_can_extract_ten_detail_links_of_cheap_prods(){
        // Given the CheapProductsPage
        $page = self::$cheapProductsPage;

        // When extracting the ten required images
        $results = $page ->extractDetailsLink();

        // Then there are ten elements in the results

        $this->assertCount(10, $results);
    }

    /**
     * @test
     *
     * Test if a user can extract ten titles of cheap products.
     *
     */
    public function a_user_can_extract_ten_titles_of_cheap_prods(){
        // Given the CheapProductsPage
        $page = self::$cheapProductsPage;

        // When extracting the ten required images
        $results = $page ->extractTitles();

        // Then there are ten elements in the results

        $this->assertCount(10, $results);
    }

    /**
     * @test
     *
     * Test if a user can extract ten prices of cheap products.
     *
     */
    public function a_user_can_extract_ten_prices_of_cheap_prods(){
        // Given the CheapProductsPage
        $page = self::$cheapProductsPage;

        // When extracting the ten required images
        $results = $page ->extractPrices();

        // Then there are ten elements in the results

        $this->assertCount(10, $results);
    }


    /**
     * @test
     *
     * Test if a user can extract ten image urls of expensive products.
     *
     */
    public function a_user_can_extract_ten_images_urls_of_expensive_prods(){
        // Given the ExpensiveProductsPage
        $page = self::$expensiveProductsPage;

        // When extracting the ten required images
        $results = $page ->extractImageUrls();

        // Then there are ten elements in the results

        $this->assertCount(10, $results);
    }

    /**
     * @test
     *
     * Test if a user can extract ten detail_links of expensive products.
     *
     */
    public function a_user_can_extract_ten_detail_links_of_expensive_prods(){
        // Given the ExpensiveProductsPage
        $page = self::$expensiveProductsPage;

        // When extracting the ten required images
        $results = $page ->extractDetailsLink();

        // Then there are ten elements in the results

        $this->assertCount(10, $results);
    }

    /**
     * @test
     *
     * Test if a user can extract ten titles of expensive products.
     *
     */
    public function a_user_can_extract_ten_titles_of_expensive_prods(){
        // Given the ExpensiveProductsPage
        $page = self::$expensiveProductsPage;

        // When extracting the ten required images
        $results = $page ->extractTitles();

        // Then there are ten elements in the results

        $this->assertCount(10, $results);
    }

    /**
     * @test
     *
     * Test if a user can extract ten prices of expensive products.
     *
     */
    public function a_user_can_extract_ten_prices_of_expensive_prods(){
        // Given the ExpensiveProductsPage
        $page = self::$expensiveProductsPage;

        // When extracting the ten required images
        $results = $page ->extractPrices();

        // Then there are ten elements in the results

        $this->assertCount(10, $results);
    }

    /**
     * @test
     *
     * Test if a user can extract ten cheap products.
     *
     */
    public function a_user_can_extract_ten_cheap_prods(){
        // Given the CheapProductsPage
        $page = self::$expensiveProductsPage;

        // When extracting the ten required images
        $results = $page ->extractProducts();
        // Then there are ten elements in the results

        $this->assertCount(10, $results);
    }

    /**
     * @test
     *
     * Test if a user can extract ten expensive products.
     *
     */
    public function a_user_can_extract_ten_expensive_prods(){
        // Given the ExpensiveProductsPage
        $page = self::$expensiveProductsPage;

        // When extracting the ten required images
        $results = $page ->extractProducts();

        // Then there are ten elements in the results

        $this->assertCount(10, $results);
    }
    
}
