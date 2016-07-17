<?php

use App\Scraper\ScraperClientInterface;


class ScraperClientTest extends TestCase
{

    /** @var ScraperClientInterface */
    private $client;

    public function setUp()
    {
        $this->client = new \App\Scraper\ScraperClient();
    }


    /**
     * @test
     *
     * Test if a client can retrieve an existent page.
     *
     */
    public function client_get_an_existent_page()
    {
        // Given an available target url
        $target = 'https://httpbin.org/get';

        // When client download it
        $page = $this->client->getPage($target);

        // Then page content is extracted successfully
        $this->assertNotNull($page->getContent());
    }

    /**
     * @test
     *
     * Test if a client can retrieve a non existent page.
     *
     */
    public function client_get_a_non_existent_page()
    {
        $this->setExpectedException('App\Scraper\Exception\RequestException');

        // Given an available target url
        $target = 'https://httpbin.org/endpointnotfound';

        // When client download it
        $page = $this->client->getPage($target);

        // Then this code is unreachable due to an exception throw
        $page->getContent();
    }

    /**
     * @test
     *
     * Test if a client can connect to an unreachable host.
     *
     */
    public function client_connect_to_unreachable_host()
    {
        $this->setExpectedException('App\Scraper\Exception\ConnectionException');

        // Given an available target url
        $target = 'https://this.url.doesnt.exist.Yeah!';

        // When client download it
        $page = $this->client->getPage($target);

        // Then this code is unreachable due to an exception throw
        $page->getContent();
    }

    /**
     * @test
     *
     * Test if a client can extract data from a page.
     *
     */
    public function client_extract_some_data()
    {
        // Given an available target url
        $target = 'https://www.appliancesdelivered.ie';

        // and an expected value
        $expectedValue = '01-5312270';

        // When client download it
        $page = $this->client->getPage($target);

        // Then page data was extracted successfully via XPath
        $this->assertEquals($expectedValue, $page->extract('/html/body/div[1]/header/div/div[1]/div[3]/div/div[2]/div[2]/div/div[2]/p'));
    }
}
