<?php

namespace Exxtensio\ExchangeRateExtension;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            ExchangeRateService::class,
            fn() => new ExchangeRateService()
        );
    }

    public function boot(): void
    {
        //
    }
}
