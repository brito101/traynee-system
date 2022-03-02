<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin.home');
    Route::prefix('admin')->name('admin.')->group(function () {
        /** Companies */
        Route::get('/companies/destroy/{id}', [CompanyController::class, 'destroy']);
        Route::resource('companies', CompanyController::class);
        /**Configurations */
        /** Genre */
        Route::get('/config/genres/destroy/{id}', [GenreController::class, 'destroy']);
        Route::resource('config/genres', GenreController::class);
    });
});

Route::get('/', [SiteController::class, 'index'])->name('home');

Auth::routes();
