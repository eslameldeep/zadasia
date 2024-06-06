<?php

use App\Domain\Core\Http\Controllers\Auth\ResetPasswordController;
use App\Domain\Core\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\Route;
use App\Domain\Core\Http\Middleware\Authenticate ; 

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


Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['LastSeenUserActivity']], function () {
    
    
    require app_path('Domain/Core/Routes/auth/dashboard_auth.route.php');
    
    Route::group(['namespace' => 'App\\Domain'  , 'middleware' => ['auth' , 'verified.dashboard' , 'role:Admin|Super Admin']], static function () {
        
        
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        
        $scanForDominNames = scandir(app_path('Domain'));
        $filteredDominNames = array_diff($scanForDominNames, array('..', '.'));
        foreach ($filteredDominNames as $key => $domain_name) {
            $scanForDirNames =  scandir(app_path('Domain/' . $domain_name));
            $filteredDirNames =  array_diff($scanForDirNames, array('..', '.'));
        
            if (!is_dir(app_path('Domain/' . $domain_name . '/Routes'))) {
                continue;
            }
        
            $scanRoutesFiles = scandir(app_path('Domain/' . $domain_name . '/Routes'));
            $filterdRoutesFiles =  array_diff($scanRoutesFiles, array('..', '.'));
            
            foreach ($filterdRoutesFiles as $key => $file) {
                try {
                    include(app_path('Domain/' . $domain_name . '/Routes/' . $file));
                } catch (\Throwable $th) {
                    //throw $th;
                }
            }
        }



    });
    // do not delete this comment or update it else you will update route manual 
});
