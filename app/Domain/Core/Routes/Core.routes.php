<?php

use App\Domain\Core\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'core', 'as' => 'core.', 'namespace' => 'Core\\Http\\Controllers'], function () {


//keep this lines for generator
//__Routes_file

Route::resource('countries', CountryController::class);

Route::resource('roles', RoleController::class);
Route::post('upload-dropzone', [App\Domain\Core\Http\Controllers\DashboardController::class , 'uploadDropzone'])->name('upload-dropzone');
Route::post('upload-tinymce', [App\Domain\Core\Http\Controllers\DashboardController::class , 'uploadTinymce'])->name('upload-tinymce');



Route::get('notification/show', [  App\Domain\Core\Http\Controllers\ProfileController::class, 'notificationShow'])->name('notification-menu.show');
Route::get('notification/update', [App\Domain\Core\Http\Controllers\ProfileController::class, 'notificationUpdate'])->name('notification-menu.update');

});

