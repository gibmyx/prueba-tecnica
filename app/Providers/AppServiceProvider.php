<?php

namespace App\Providers;

use App\Repositories\Purchases\PurchasesRepository;
use App\Repositories\Purchases\PurchasesRepositoryInterface;
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
        $this->app->bind(
            PurchasesRepositoryInterface::class,
            PurchasesRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
