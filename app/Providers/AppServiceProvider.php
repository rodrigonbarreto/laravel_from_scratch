<?php

namespace App\Providers;

use function foo\func;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Billing\Stripe;

/**
 * Class AppServiceProvider
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        Schema::defaultStringLength(191);
        view()->composer('partials.sidebar', function($view) {

            $view->with('archives', \App\Post::archives());
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        // App::bind it's ok, but in this case let's use singleton
        // you can use \App::singleton  but $this->app-> it's better to work with provider

        $this->app->singleton(Stripe::class, function (){
            return new Stripe(config('services.stripe.secret'));
        });
    }
}
