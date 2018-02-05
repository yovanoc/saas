<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('/impersonate', 'ImpersonateController@index');
    Route::post('/impersonate', 'ImpersonateController@start')->name('impersonate.start');
});

Route::delete('/admin/impersonate', 'Admin\ImpersonateController@destroy')->name('admin.impersonate.destroy');

Route::group(['middleware' => ['auth', 'subscription.active']], function () {
    Route::get('/dashboard', 'DashboardController@index');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login/twofactor', 'Auth\TwoFactorLoginController@index')->name('login.twofactor.index');
    Route::post('/login/twofactor', 'Auth\TwoFactorLoginController@verify')->name('login.twofactor.verify');
});

/**
 * Account
 */
Route::group(['prefix' => 'account', 'middleware' => ['auth'], 'as' => 'account.', 'namespace' => 'Account'], function () {
    Route::get('/', 'AccountController@index')->name('index');

    /**
     * Profile
     */
    Route::get('profile', 'ProfileController@index')->name('profile.index');
    Route::post('profile', 'ProfileController@store')->name('profile.store');

    /**
     * Password
     */
    Route::get('password', 'PasswordController@index')->name('password.index');
    Route::post('password', 'PasswordController@store')->name('password.store');

    /**
     * Tokens
     */
    Route::get('tokens', 'TokenController@index')->name('tokens.index');

    /**
     * Deactivate
     */
    Route::get('deactivate', 'DeactivateController@index')->name('deactivate.index');
    Route::post('deactivate', 'DeactivateController@store')->name('deactivate.store');

    /**
     * Two factor
     */
    Route::group([], function () {
        Route::get('/twofactor', 'TwoFactorController@index')->name('twofactor.index');
        Route::post('/twofactor', 'TwoFactorController@store')->name('twofactor.store');
        Route::post('/twofactor/verify', 'TwoFactorController@verify')->name('twofactor.verify');
        Route::delete('/twofactor', 'TwoFactorController@destroy')->name('twofactor.destroy');
    });

    /**
     * Subscription
     */
    Route::group(['prefix' => 'subscription', 'namespace' => 'Subscription', 'middleware' => ['subscription.owner']], function () {
        /**
         * Cancel
         */
        Route::group(['middleware' => 'subscription.notcancelled'], function () {
            Route::get('/cancel', 'SubscriptionCancelController@index')->name('subscription.cancel.index');
            Route::post('/cancel', 'SubscriptionCancelController@store')->name('subscription.cancel.store');
        });

        /**
         * Resume
         */
        Route::group(['middleware' => 'subscription.cancelled'], function () {
            Route::get('/resume', 'SubscriptionResumeController@index')->name('subscription.resume.index');
            Route::post('/resume', 'SubscriptionResumeController@store')->name('subscription.resume.store');
        });

        /**
         * Swap
         */
        Route::group(['middleware' => 'subscription.notcancelled'], function () {
            Route::get('/swap', 'SubscriptionSwapController@index')->name('subscription.swap.index');
            Route::post('/swap', 'SubscriptionSwapController@store')->name('subscription.swap.store');
        });

        /**
         * Card
         */
        Route::group(['middleware' => 'subscription.customer'], function () {
            Route::get('/card', 'SubscriptionCardController@index')->name('subscription.card.index');
            Route::post('/card', 'SubscriptionCardController@store')->name('subscription.card.store');
        });

        /**
         * Team
         */
        Route::group(['middleware' => ['subscription.team']], function () {
            Route::get('/team', 'SubscriptionTeamController@index')->name('subscription.team.index');
            Route::patch('/team', 'SubscriptionTeamController@update')->name('subscription.team.update');

            Route::post('/team/member', 'SubscriptionTeamMemberController@store')->name('subscription.team.member.store');
            Route::delete('/team/member/{user}', 'SubscriptionTeamMemberController@destroy')->name('subscription.team.member.destroy');
        });
    });

});

/**
 * Account activation.
 */
Route::group(['prefix' => 'activation', 'as' => 'activation.', 'middleware' => ['guest']], function () {
    Route::get('/resend', 'Auth\ActivationResendController@index')->name('resend');
    Route::post('/resend', 'Auth\ActivationResendController@store')->name('resend.store');
    Route::get('/{confirmation_token}', 'Auth\ActivationController@activate')->name('activate');
});

/**
 * Subscription plans.
 */
Route::group(['prefix' => 'plans', 'as' => 'plans.', 'middleware' => 'subscription.inactive'], function () {
    Route::get('/', 'Subscription\PlanController@index')->name('index');
    Route::get('/teams', 'Subscription\PlanTeamController@index')->name('teams.index');
});

/**
 * Subscription
 */
Route::group(['prefix' => 'subscription', 'as' => 'subscription.', 'middleware' => ['auth.register', 'subscription.inactive']], function () {
    Route::get('/', 'Subscription\SubscriptionController@index')->name('index');
    Route::post('/', 'Subscription\SubscriptionController@store')->name('store');
});

/**
 * Webhooks
 */

Route::post('/webhooks/stripe', 'Webhooks\StripeWebhookController@handleWebhook');

