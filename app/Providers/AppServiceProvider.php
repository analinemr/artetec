<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Artesao;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        // Torna $artesaos disponível em todas as views (como o menu)
        View::composer('*', function ($view) {
            $artesaos = Artesao::orderBy('nome')->get();
            $view->with('artesaos', $artesaos);
        });
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}
