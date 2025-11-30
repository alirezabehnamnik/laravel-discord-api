<?php

namespace Reysa\DiscordAPI;

use Illuminate\Support\ServiceProvider;

class DiscordApiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/discord-api.php',
            'discord-api'
        );

        $this->app->singleton('discord-api', function ($app) {
            return new DAPI();
        });
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/discord-api.php' => config_path('discord-api.php'),
            ], 'discord-api-config');
        }
    }
}
