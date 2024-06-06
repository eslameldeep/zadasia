<?php

namespace App\Providers;

use App\Domain\Frontend\Models\Field;
use App\Domain\Frontend\Models\Product;
use App\View\Frontend\Layout\Layout;
use App\View\Echocloud\Layout\Layout as echocloudLayOut ;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        Schema::defaultStringLength(191);
        
        View::composer('adminlte::page', static function ($view) {
            $routes = [] ;
            
            $view->with('sidebarRoutes', $routes);
        });
        view()->composer([
            'frontend.layout.layout' , 
             'echocloud.*'
            ], function ($view) {
            $current_locale = app()->getLocale() ;
            $available_locale = config('app.available_locales') ;
            $current_locale_object = $available_locale[$current_locale] ;
        
            $view->with('current_locale', $current_locale);
            $view->with('available_locale', $available_locale);
            $view->with('current_locale_object', $current_locale_object);

        });


        view()->composer('frontend.sectaions.footer', function ($view) {
            $Products = Product::where('status' , true)->orderBy('sort')->get(['name' , 'slug']);
            $Fields = Field::where('status' , true)->orderBy('sort')->get(['name' , 'slug']);
            $view->with('Products', $Products);
            $view->with('Fields', $Fields);

        });

        Blade::component('frontend-layout', Layout::class);
        Blade::component('echocloud-layout', echocloudLayOut::class);
    }
}
