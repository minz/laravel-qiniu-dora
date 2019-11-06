<?php

namespace Minz\Laravel\Qiniu\Dora;

use Illuminate\Support\ServiceProvider;

class QiniuDoraServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('dora', function () {
            return new QiniuDora();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . "/config/qinniuDora.php" => config_path("qiniuDora.php"),
        ]);
    }
}