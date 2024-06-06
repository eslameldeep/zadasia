<?php



use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'echo-cloud',
    'middleware' => ['LastSeenUserActivity'],
    'namespace' => 'App\Domain\Echocloud\Http\Controllers', 'as' => 'echocloud.'], function () {

    require app_path('Domain/Echocloud/Routes/auth/echocloud_auth.route.php');
    
    Route::get('/get-countries', 'EchoCloudDashboardController@getCountriesAjax')->name('get-countries');

    Route::group(['middleware' => ['auth', 'verified.echocloud' , 'echocloud']], static function () {
        
        Route::get('/', 'EchoCloudDashboardController@dashboard')->name('home');
        Route::get('/profile', 'ProfileController@profile')->name('profile');
        Route::PUT('/profile', 'ProfileController@update');
        
        
        Route::get('/devices', 'DevicesController@index')->name('devices.index');
        Route::get('/devices/{device}', 'DevicesController@show')->name('devices.show');
        Route::get('/devices/{device}/get-data/{hours}', 'DevicesController@lastData')->name('devices.last-data');
    });
});
