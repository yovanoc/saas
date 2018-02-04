<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;
use Stripe\Stripe;

class StripeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        Cashier::useCurrency('eur', '€');
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
