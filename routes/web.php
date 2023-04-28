<?php

use App\Http\Controllers\AdminController\HomepageAdminController;
use App\Http\Controllers\AdminController\LoginController;
use App\Http\Controllers\AdminController\UserController;
use App\Http\Middleware\CheckLoginAdminPage;
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

Route::group(['controller' =>   LoginController::class, 'prefix' => 'login', 'as' => 'login.'], function () {
    Route::get('/', 'index')->name('index');
    Route::post('process', 'processLogin')->name('process');
    Route::get('logout', 'logout')->name('logout');
});


Route::middleware([CheckLoginAdminPage::class])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::group(['controller' => HomepageAdminController::class, 'prefix' => 'homepage', 'as' => 'homepage.'], function () {
            Route::get('/', 'index')->name('index');
        });
        Route::group(['controller' => UserController::class, 'prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::post('edit', 'edit')->name('edit');
            Route::post('update', 'update')->name('update');
            Route::delete('destroy', 'destroy')->name('destroy');
            
        });
    });
    
});
