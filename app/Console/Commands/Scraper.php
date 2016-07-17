<?php

namespace App\Console\Commands;

use App\Product;
use App\Scraper\AppliancesDelivered\AppliancesDeliveredClient;
use App\Scraper\ScraperClientInterface;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class Scraper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scraper:retrieval';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs a scraper data retrieval';

    /**
     * Execute the console command.
     *
     * @param ScraperClientInterface $client scraper client
     */
    public function handle(AppliancesDeliveredClient $client)
    {
        Log::info('Executing a Scraping Data retrieval on ' . Carbon::now()->toDateTimeString() . ' ...');
        
        $cheapProductsPage = $client->getCheapProductsPage();
        $expensiveProductsPage = $client->getExpensiveProductsPage();

        Log::info('Extracting cheap products...');
        $cheapProducts = $cheapProductsPage->extractProducts();
        Log::debug($cheapProducts);

        Log::info('Extracting expensive products...');
        $expensiveProducts = $expensiveProductsPage->extractProducts();
        Log::debug($expensiveProducts);

        Log::info('Storing products into database');
        $this->storeProducts($cheapProducts);
        $this->storeProducts($expensiveProducts);
    }

    /**
     * Store retrieved array of products.
     *
     * @param array $products array of products
     */
    public function storeProducts(array $products)
    {
        foreach ($products as $product) {

            $candidate = new Product;
            $candidate->name = $product['title'];
            $candidate->description = $product['detailLink'];
            $candidate->price = preg_replace('#^€#', '', $product['price']);
            $candidate->image = $product['imageLink'];

            $existentProduct = Product::findByName($product['title']);

            // If product already exists
            if ($existentProduct != null) {
                Log::debug('Product "' . $product['title'] . '" already exists!');

                // If existed product changed its properties, update it!
                if (
                    $candidate->name != $existentProduct->name ||
                    $candidate->description != $existentProduct->description ||
                    $candidate->price != $existentProduct->price ||
                    $candidate->image != $existentProduct->image
                ) {
                    Log::debug('Product "' . $product['title'] . '" has changed since las time! Performing an update');

                    $existentProduct->save([
                        'name' => $candidate->name,
                        'description' => $candidate->description,
                        'price' => $candidate->price,
                        'image' => $candidate->image,
                    ]);
                }
            } else { // Save directly the product
                $candidate->save();
            }
        }
    }
}
