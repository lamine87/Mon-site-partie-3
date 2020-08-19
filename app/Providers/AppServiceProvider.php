<?php

namespace App\Providers;

use App\Http\ViewComposers\PageComposer;
use http\Url;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

//        view()->composer('page', PageComposer::class);
    }
}
