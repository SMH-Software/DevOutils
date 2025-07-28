<?php

namespace DevOutils;

use Illuminate\Support\ServiceProvider;

class DevOutilsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(DevOutils::class, function () {
            return new DevOutils();
        });
    }

    public function boot()
    {
       
    }
}