<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerNavigationItems([
                NavigationItem::make('Home')
                    ->url('/')
                    ->icon('heroicon-o-home-modern')
                    ->activeIcon('heroicon-s-home-modern')
                    ->group('Page')
                    ->sort(3),
            ]);
        });
    }
}
