<?php

namespace Foostart\Filemanager;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

/**
 * Class FilemanagerServiceProvider.
 */
class FilemanagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Config::get('lfm.use_package_routes')) {
            include __DIR__ . '/routes.php';
        }

        $this->loadTranslationsFrom(__DIR__.'/lang', 'package-filemanager');

        $this->loadViewsFrom(__DIR__.'/views', 'package-filemanager');

        $this->publishes([
            __DIR__ . '/config/lfm.php' => base_path('config/lfm.php'),
        ], 'lfm_config');

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/package-filemanager'),
        ], 'lfm_public');

        $this->publishes([
            __DIR__.'/views'  => base_path('resources/views/vendor/package-filemanager'),
        ], 'lfm_view');

        $this->publishes([
            __DIR__.'/Handlers/LfmConfigHandler.php' => base_path('app/Handlers/LfmConfigHandler.php'),
        ], 'lfm_handler');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('package-filemanager', function () {
            return true;
        });
    }
}
