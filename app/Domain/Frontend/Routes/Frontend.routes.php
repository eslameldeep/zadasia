<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'frontend', 'as' => 'frontend.', 'namespace' => 'Frontend\\Http\\Controllers'], function () {


//keep this lines for generator 
//__Routes_file
// Route::post('events/sort','EventController@updateOrder') ->name ('events.sort');
Route::resource('events', EventController::class);

Route::post('articles/sort','ArticleController@updateOrder') ->name ('articles.sort');
Route::resource('articles', ArticleController::class);


Route::post('fields/sort','FieldController@updateOrder') ->name ('fields.sort');
Route::resource('fields', FieldController::class);

Route::post('fields.fields_frameworks/sort','FieldsFrameworkController@updateOrder') ->name ('fields.fields_frameworks.sort');
Route::resource('fields.fields_frameworks', FieldsFrameworkController::class);

Route::post('fields.fields_objectives/sort','FieldsObjectiveController@updateOrder') ->name ('fields.fields_objectives.sort');
Route::resource('fields.fields_objectives', FieldsObjectiveController::class);


Route::post('products/sort','ProductController@updateOrder') ->name ('products.sort');
Route::resource('products', ProductController::class);

Route::post('products.products_features/sort','ProductsFeatureController@updateOrder') ->name ('products.products_features.sort');
Route::resource('products.products_features', ProductsFeatureController::class);

Route::post('products.products_sensors/sort','ProductsSensorController@updateOrder') ->name ('products.products_sensors.sort');
Route::resource('products.products_sensors', ProductsSensorController::class);


Route::post('software/sort','SoftwareController@updateOrder') ->name ('softwares.sort');
Route::resource('softwares', SoftwareController::class);

Route::post('challenges/sort','ChallengeController@updateOrder') ->name ('challenges.sort');
Route::resource('challenges', ChallengeController::class);

Route::post('partners/sort','PartnerController@updateOrder') ->name ('partners.sort');
Route::resource('partners', PartnerController::class);




});

 