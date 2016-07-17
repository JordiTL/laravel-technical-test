<?php


namespace tests\unit\Scraper;
use App\Console\Commands\Scraper;
use App\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ScraperTest extends \TestCase
{

    use DatabaseMigrations;


    /**
     * @test
     *
     * Test if the system can insert new products via console command.
     *
     */
    public function the_system_can_insert_new_products_via_command(){

        // Given a scrapper command
        $cmd = new Scraper;

        // and a product array
        $productNative = array(
            'title' =>  'Lavazza A Modo Mio Intenso Capsules',
            'detailLink' => 'https://www.appliancesdelivered.ie/lavazza-a-modo-mio-intenso-capsules/1692',
            'price' => 6.49,
            'imageLink' => "https://img.resized.co/appliancesdelivered/eyJkYXRhIjoie1widXJsXCI6XCJodHRwczpcXFwvXFxcL3MzLWV1LXdlc3QtMS5hbWF6b25hd3MuY29tXFxcL3N0b3JhZ2UuYnV5YW5kc2VsbC5pZVxcXC91cGxvYWRzXFxcLzE2OTJcXFwvMmEyN2M2ZDM0ZmM3ZmI4MGQwOTdlNDQxYTA3NTZlYWZcIixcIndpZHRoXCI6MjUwLFwiaGVpZ2h0XCI6XCJcIixcImRlZmF1bHRcIjpcImh0dHBzOlxcXC9cXFwvczMtZXUtd2VzdC0xLmFtYXpvbmF3cy5jb21cXFwvc3RvcmFnZS5idXlhbmRzZWxsLmllXFxcL2FwcGxpYW5jZXMtZGVsaXZlcmVkLW5vaW1hZ2UucG5nXCJ9IiwiaGFzaCI6ImQ3ZDBmNmFmZjM4MDI4MDI2Yjc5ODQxODYyZGZmNzIzZDNlYjU3MzgifQ==/lavazza-a-modo-mio-intenso-capsules",
        );
        $productArray = array($productNative);

        // When storing products
        $cmd->storeProducts($productArray);

        // Then must be a product in database
        $retrievedProduct = Product::first();
        $this->assertNotNull($retrievedProduct);
    }

    /**
     * @test
     *
     * Test if the system can update existent products via console command.
     *
     */
    public function the_system_can_update_existent_products_via_command(){

        // Given a scrapper command
        $cmd = new Scraper;

        // and a product array
        $productNative = array(
            'title' =>  'Lavazza A Modo Mio Intenso Capsules',
            'detailLink' => 'https://www.appliancesdelivered.ie/lavazza-a-modo-mio-intenso-capsules/1692',
            'price' => 6.49,
            'imageLink' => "https://img.resized.co/appliancesdelivered/eyJkYXRhIjoie1widXJsXCI6XCJodHRwczpcXFwvXFxcL3MzLWV1LXdlc3QtMS5hbWF6b25hd3MuY29tXFxcL3N0b3JhZ2UuYnV5YW5kc2VsbC5pZVxcXC91cGxvYWRzXFxcLzE2OTJcXFwvMmEyN2M2ZDM0ZmM3ZmI4MGQwOTdlNDQxYTA3NTZlYWZcIixcIndpZHRoXCI6MjUwLFwiaGVpZ2h0XCI6XCJcIixcImRlZmF1bHRcIjpcImh0dHBzOlxcXC9cXFwvczMtZXUtd2VzdC0xLmFtYXpvbmF3cy5jb21cXFwvc3RvcmFnZS5idXlhbmRzZWxsLmllXFxcL2FwcGxpYW5jZXMtZGVsaXZlcmVkLW5vaW1hZ2UucG5nXCJ9IiwiaGFzaCI6ImQ3ZDBmNmFmZjM4MDI4MDI2Yjc5ODQxODYyZGZmNzIzZDNlYjU3MzgifQ==/lavazza-a-modo-mio-intenso-capsules",
        );
        $productArray = array($productNative);

        // and a product model
        $product = new Product;
        $product->name = $productNative['title'];
        $product->description = $productNative['detailLink'];
        $product->price = $productNative['price'];
        $product->image= $productNative['imageLink'];


        // When storing the product
        $product->save();

        // and updated the price
        $productNative['price'] = 8.45;

        // and performing storing operation
        $cmd->storeProducts($productArray);

        // Then must be one element in database with updated price
        $retrievedProduct = Product::first();
        $retrievedProductList = Product::all();

        $this->assertNotEquals($productNative['price'], $retrievedProduct->price);
        $this->assertCount(1, $retrievedProductList);
    }
}
