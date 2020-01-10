<?php

namespace Wareon\RakutenRms;

use Illuminate\Support\ServiceProvider;

class RakutenRmsServiceProvider extends ServiceProvider
{
    /**
     * delay load
     * @var bool
     */
    protected $defer = true;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Single Class
        $this->app->singleton('RakutenRms', function ($app) {
            return new RakutenRms($app['config']);
        });

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
		$this->loadViewsFrom(__DIR__ . '/views', 'RakutenRms'); // view dir
        $this->publishes([
            //__DIR__ . '/views' => base_path('resources/views/rakuten-rms'),  // publish to resources dir
            __DIR__ . '/config/rakuten-rms.php' => config_path('rakuten-rms.php'), // publish to laravel config dir
        ]);
    }

    public function provides()
    {
        return ['RakutenRms'];
    }
}
