<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\UserController;
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
        View::composer('home', function ($view) {
            $controller = new UserController();
            $monthExpense = $controller->monthExpense();
            $monthIncome = $controller->monthIncome();
            $view->with('monthExpense', $monthExpense);
            $view->with('monthIncome', $monthIncome);
        });
    }
}
