<?php

namespace Smarch\Lex;

use Auth;
use Blade;
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
            __DIR__.'/Config/lex.php' => config_path('lex.php')
        ], 'config');

        $this->publishes([
            __DIR__.'/Views' => base_path('resources/views/vendor/lex')
        ], 'views');
        
        // migrations folder
        $this->publishes([
            __DIR__.'/migrations' => $this->app->databasePath().'/migrations'
        ], 'migrations');

        // register blade directives
        $this->registerBladeDirectives();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Merge config files
        $this->mergeConfigFrom(__DIR__.'/Config/lex.php','lex');

        // load our routes
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/routes.php';
        }

        // Register it
        $this->app->bind('lex', function() {
             return new Lex;
        });
    }

    /**
     * Register blade directive to define var in blade.
     *
     *  @define $var = whatever.
     * 
     * @return void
     */
    public function registerBladeDirectives ()
    {
        Blade::directive('define', function($expression) {
            return "<?php {$expression}; ?>";
        });
    }

}
