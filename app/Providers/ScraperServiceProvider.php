<?php

namespace App\Providers;

use App\Scraper\AppliancesDelivered\AppliancesDeliveredClient;
use Illuminate\Support\ServiceProvider;

class ScraperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AppliancesDeliveredClient::class, function () {
            return new AppliancesDeliveredClient();
        });
    }
}
