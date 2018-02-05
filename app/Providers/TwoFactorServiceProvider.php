<?php

namespace App\Providers;

use GuzzleHttp\Client;
use App\TwoFactor\Authy;
use App\TwoFactor\TwoFactor;
use Illuminate\Support\ServiceProvider;

class TwoFactorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(TwoFactor::class, function () {
            return new Authy(new Client);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
