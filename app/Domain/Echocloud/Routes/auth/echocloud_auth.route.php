<?php

use App\Domain\Echocloud\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Domain\Echocloud\Http\Controllers\Auth\RegisterController;
use App\Domain\Echocloud\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => ''], static function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])
         ->middleware('guest')
         ->name('login');

    Route::post('/login', [LoginController::class, 'login'])
         ->middleware('guest');


         Route::POST('/logout', [AuthenticatedSessionController::class, 'destroy'])
         ->middleware('auth')
         ->name('logout');
     
//      Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
//          ->middleware('guest')
//          ->name('register');

//     Route::post('/register', [RegisterController::class, 'register'])
//          ->middleware('guest');


          Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
          Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
          Route::POST('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
         //todo fix this routs
         Route::get('password/reset',  'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
         Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
         Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
         Route::post('password/reset/{token}', 'Auth\ResetPasswordController@reset');
         
     });
