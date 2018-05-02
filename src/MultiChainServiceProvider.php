<?php
namespace imperiansystems\multichain;

use Illuminate\Support\ServiceProvider;

class MultiChainServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if(!$this->app->routesAreCached())
        {
            require __DIR__.'/routes.php';
        }

        $this->loadViewsFrom(__DIR__.'/views', 'multichain');
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
