<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes(['register' => false]);

    //set locale 
    
    Route::get('language/{locale}', function ($locale) {
        
        $available_locales  = config('app.available_locales') ; 
        $locale = (array_key_exists($locale, $available_locales))  ? $locale : 'en' ;   
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    })->name('switch-lang');

    Route::get('deep', function () {
        
    return view('echocloud.auth.welcome-email');
    })->name('deep-lang');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'] )->name('home');


// Route::get('/example',function ()
// {
    
//     return view('example');
// }) ; 
