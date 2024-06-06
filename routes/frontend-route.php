<?php

use App\Domain\Frontend\Models\Field;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ],
    'namespace' => 'App\Domain\Frontend\Http\Controllers\website', 'as' => 'frontend.'], function () {
        
    Route::get('/', 'WebsiteController@Home')->name('home');

    Route::get('/fields', 'WebsiteController@Fields')->name('fields');
    Route::get('/field/{field_slug}', 'WebsiteController@Field')->name('fields.show');
        
    Route::get('/products', 'WebsiteController@Products' )->name('products');
    Route::get('/products/{product}', 'WebsiteController@Product')->name('products.show');
    
    Route::get('/software', 'WebsiteController@Software')->name('software');
    
    Route::get('/events', function () { return trans('incomplete page') ; })->name('events');
    Route::get('/events/{event-slug}', function () { return trans('incomplete page') ; })->name('events.show');

    Route::get('/articles', function () { return trans('Incomplete page') ; })->name('articles');
    Route::get('/articles/{article-slug}', function () { return trans('incomplete page') ; })->name('articles.show');
   
    Route::get('/challenges', 'WebsiteController@challenges')->name('challenges');
    Route::get('/challenges/{id}','WebsiteController@challenge')->name('challenges.show');
    
    Route::get('/contact-us', function(){
        return Redirect()->back();
    })->name('contact-us');
    Route::post('/contact-us', function(){
        return Redirect()->back();
    });
        
});
