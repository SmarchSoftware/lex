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
            __DIR__.'/Config/Watchtower.php' => config_path('lex.php')
        ], 'config');

        $this->publishes([
            __DIR__.'/Views' => base_path('resources/views/smarch/lex')
        ], 'views');

        // Merge config files
        $this->mergeConfigFrom(__DIR__.'/Config/Lex.php','lex');

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

        // View Composer
        $this->app['view']->composer('*',function($view){
           $view->theme = isset( Auth::user()->theme ) ? Auth::user()->theme : $this->app['config']->get('lex.default_theme');
           $view->title = $this->app['config']->get('lex.site_title');
        });

        // Register it
        $this->app->bind('lex', function() {
             return new Lex;
        });
    }
}
