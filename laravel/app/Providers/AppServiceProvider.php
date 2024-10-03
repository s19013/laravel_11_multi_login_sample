<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // ページによって使うセッションを変える
        // お互いのページには影響がないため大丈夫らしい(情報が少ないため不安が残る)
        if (request()->is('warehouse/*')) {
            config(['session.cookie' => config('session.warehouse_cookie')]);
        }

        if (request()->is('agency/*')) {
            config(['session.cookie' => config('session.agency_cookie')]);
        }
    }
}
