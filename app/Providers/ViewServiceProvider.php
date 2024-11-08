<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Settinge;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        view()->composer('front.inc.header', function ($view){
            $view->with('cats', Category::select('id', 'name')->get());            $view->with('cats', Category::select('id', 'name')->get());
            $view->with('setts', Settinge::select('name', 'logo', 'favicon')->first());

        });

        view()->composer('front.inc.footer', function ($view){
            $view->with('setts', Settinge::first());

        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
