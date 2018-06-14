<?php

namespace AlanMosko\PhotonImageCdn;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class PhotonImageCdnServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $this->publishes([
            __DIR__.'/Config/PhotonImageCdn.php' => config_path('photon-image-cdn.php'),
        ], 'photon-image-cdn');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/Config/PhotonImageCdn.php', 'PhotonImageCdn'
        );
        require_once __DIR__ . '/Helpers/PhotonImageCdnHelper.php';
    }
}
