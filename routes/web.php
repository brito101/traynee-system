<?php

use App\Http\Controllers\Admin\ACL\PermissionController;
use App\Http\Controllers\Admin\ACL\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\FranchiseController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\ScholarityController;
use App\Http\Controllers\Admin\UserController;
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
        /** Chart home */
        Route::get('/chart', [AdminController::class, 'chart'])->name('home.chart');

        /** Users */
        Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::get('/users/destroy/{id}', [UserController::class, 'destroy']);
        Route::resource('users', UserController::class);

        /** Franchise */
        Route::get('/franchise/edit', [FranchiseController::class, 'edit'])->name('franchise.edit');
        Route::get('/franchise/edit/social-network', [FranchiseController::class, 'socialNetwork'])->name('franchise.social');
        Route::put('/franchise/edit/social-network', [FranchiseController::class, 'socialNetworkStore'])->name('franchise.social.store');
        Route::get('/franchise/edit/resume', [FranchiseController::class, 'resume'])->name('franchise.resume');
        Route::put('/franchise/edit/resume', [FranchiseController::class, 'resumeStore'])->name('franchise.resume.store');
        Route::get('/franchise/edit/brand-images', [FranchiseController::class, 'brandImages'])->name('franchise.brand');
        Route::put('/franchise/edit/brand-images', [FranchiseController::class, 'brandImagesStore'])->name('franchise.brand.store');
        Route::get('/franchises/destroy/{id}', [FranchiseController::class, 'destroy']);
        Route::resource('franchises', FranchiseController::class);

        /** Companies */
        Route::get('/company/edit', [CompanyController::class, 'edit'])->name('company.edit');
        Route::get('/company/edit/social-network', [CompanyController::class, 'socialNetwork'])->name('company.social');
        Route::put('/company/edit/social-network', [CompanyController::class, 'socialNetworkStore'])->name('company.social.store');
        Route::get('/company/edit/resume', [CompanyController::class, 'resume'])->name('company.resume');
        Route::put('/company/edit/resume', [CompanyController::class, 'resumeStore'])->name('company.resume.store');
        Route::get('/company/edit/brand-images', [CompanyController::class, 'brandImages'])->name('company.brand');
        Route::put('/company/edit/brand-images', [CompanyController::class, 'brandImagesStore'])->name('company.brand.store');
        Route::get('/companies/destroy/{id}', [CompanyController::class, 'destroy']);
        Route::resource('companies', CompanyController::class);

        /**
         * Configurations
         * */
        /** Genres */
        Route::get('/config/genres/destroy/{id}', [GenreController::class, 'destroy']);
        Route::resource('config/genres', GenreController::class);
        /** Scholarities */
        Route::get('/config/scholarities/destroy/{id}', [ScholarityController::class, 'destroy']);
        Route::resource('config/scholarities', ScholarityController::class);

        /**
         * ACL
         * */
        /** Permissions */
        Route::get('/permission/destroy/{id}', [PermissionController::class, 'destroy']);
        Route::resource('permission', PermissionController::class);
        /** Roles */
        Route::get('/role/destroy/{id}', [RoleController::class, 'destroy']);
        Route::get('role/{role}/permission', [RoleController::class, 'permissions'])->name('role.permissions');
        Route::put('role/{role}/permission/sync', [RoleController::class, 'permissionsSync'])->name('role.permissionsSync');
        Route::resource('role', RoleController::class);
    });
});

Route::get('/', [SiteController::class, 'index'])->name('home');

Auth::routes();
