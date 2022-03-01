<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CompanyController;
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
        Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
        Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
        Route::post('/companies/create', [CompanyController::class, 'store'])->name('companies.store');
        Route::get('/companies/edit/{id}', [CompanyController::class, 'edit'])->name('companies.edit');
        Route::post('/companies/update/{id}', [CompanyController::class, 'update'])->name('companies.update');
        Route::get('/companies/destroy/{id}', [CompanyController::class, 'destroy'])->name('companies.destroy');
    });
});

Route::get('/', [SiteController::class, 'index'])->name('home');

Auth::routes();
