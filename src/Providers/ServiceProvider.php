<?php

namespace Gegosoft\Dogecoin\Providers;

use Gegosoft\Dogecoin\Client as DogecoinClient;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $path = realpath(__DIR__.'/../../config/config.php');

        $this->publishes([$path => config_path('dogecoind.php')], 'config');
        $this->mergeConfigFrom($path, 'dogecoind');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAliases();

        $this->registerClient();
    }

    /**
     * Register aliases.
     *
     * @return void
     */
    protected function registerAliases()
    {
        $aliases = [
            'dogecoind' => 'Gegosoft\Dogecoin\Client',
        ];

        foreach ($aliases as $key => $aliases) {
            foreach ((array) $aliases as $alias) {
                $this->app->alias($key, $alias);
            }
        }
    }

    /**
     * Register client.
     *
     * @return void
     */
    protected function registerClient()
    {
        $this->app->singleton('dogecoind', function ($app) {
            return new DogecoinClient([
                'scheme' => $app['config']->get('dogecoind.scheme', 'http'),
                'host'   => $app['config']->get('dogecoind.host', 'localhost'),
                'port'   => $app['config']->get('dogecoind.port', 8332),
                'user'   => $app['config']->get('dogecoind.user'),
                'pass'   => $app['config']->get('dogecoind.password'),
                'ca'     => $app['config']->get('dogecoind.ca'),
            ]);
        });
    }
}
