<?php

namespace App\Providers;

use App\Models\Order;
use App\Observers\OrderObserver;
use App\Models\OrderDiscussion;
use App\Observers\OrderDiscussionObserver;
use App\Models\Refund;
use App\Observers\RefundObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Order::observe(OrderObserver::class);
        OrderDiscussion::observe(OrderDiscussionObserver::class);
        Refund::observe(RefundObserver::class);
        Paginator::useBootstrap();
    }
}
