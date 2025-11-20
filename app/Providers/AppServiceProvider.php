<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\OrderItemReturn;
use App\Observers\OrderObserver;
use Illuminate\Support\ServiceProvider;
use App\Observers\OrderItemReturnObserver;
use App\Services\FirebaseNotificationService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(FirebaseNotificationService::class, function ($app) {
            $projectId = config('firebase.project_id');
            return new FirebaseNotificationService($projectId);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Order::observe(OrderObserver::class);
        OrderItemReturn::observe(OrderItemReturnObserver::class);
    }
}
