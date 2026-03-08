<?php

namespace Ewa\Tokeet;

use Ewa\Tokeet\Console\InstallCommand;
use Illuminate\Support\ServiceProvider;

class TokeetServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/tokeet.php', 'tokeet');

        $this->app->bind('ewa-tokeet', function () {
            return new TokeetController;
        });
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/tokeet.php' => config_path('tokeet.php'),
            ], 'config');

            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}
