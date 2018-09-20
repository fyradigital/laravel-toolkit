<?php namespace FyraDigital\LaravelToolkit;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Tools', function($app){
            return new Tools();
        });

        $this->publishes([
            __DIR__.'/resources/css' => public_path('fyra/tools/css'),
            __DIR__.'/resources/images' => public_path('fyra/tools/images'),
            __DIR__.'/resources/js' => public_path('fyra/tools/js'),
        ], 'public');

        $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->loadViewsFrom(__DIR__.'/resources/views', 'tools');
    }
}
