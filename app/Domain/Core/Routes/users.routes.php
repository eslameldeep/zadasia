<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'core', 'as' => 'core.', 'namespace' => 'Core\\Http\\Controllers'], function () {
   
    Route::get('/profile', [App\Domain\Core\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [App\Domain\Core\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::resource('users', UserController::class);
});
