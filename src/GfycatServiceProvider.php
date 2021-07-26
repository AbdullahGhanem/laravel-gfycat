<?php

namespace Ghanem\Gfycat;

use Illuminate\Support\ServiceProvider;

class GfycatServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/gfycat.php', 'gfycat');

        $this->app->bind('ghanem-gfycat', function () {
            return new GfycatController;
        });

    }
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/gfycat.php' => config_path('gfycat.php'),
        ], 'config');
    }
}
