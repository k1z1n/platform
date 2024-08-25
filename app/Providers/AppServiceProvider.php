<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
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
        // Используем Tailwind CSS для пагинации
        Paginator::useTailwind();

        // Определение кастомных Blade-директив
        Blade::if('adminArea', function () {
            return request()->is('admin') || request()->is('admin/*');
        });

        Blade::if('studentArea', function () {
            return request()->is('student') || request()->is('student/*');
        });
    }
}
