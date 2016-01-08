<?php

namespace Smarch\Lex;

use Auth;
use Config;
use Illuminate\Support\ServiceProvider;

class LexServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // load the views
        $this->loadViewsFrom(__DIR__.'/Views', 'lex');

        // Publishes package files
        $this->publishes([
            __DIR__.'/Config/Lex.php' => config_path('lex.php')
        ], 'config');

        $this->publishes([
            __DIR__.'/Views' => base_path('resources/views/smarch/lex')
        ], 'views');

        // Merge config files
        $this->mergeConfigFrom(__DIR__.'/Config/Lex.php','lex');

        // migrations folder
        $this->publishes([
            __DIR__.'/migrations' => $this->app->databasePath().'/migrations'
        ], 'migrations');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // load our routes
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/routes.php';
        }

        // Register it
        $this->app->bind('lex', function() {
             return new \Smarch\Lex\Lex;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['lex'];
    }
}
