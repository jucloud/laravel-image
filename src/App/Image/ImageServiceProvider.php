<?php

namespace App\Image;


use Illuminate\Support\ServiceProvider;

class ImageServiceProvider extends ServiceProvider
{

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../migrations');
        $this->publishes([
            __DIR__ . '/../../config/config.php' => config_path('image.php'),

            // master files
            __DIR__ . '/../../master/Image.php.dist' => app_path('Models/Image/Image.php'),

        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/config.php',
            'image'
        );
    }
}