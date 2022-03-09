<?php

use App\Http\Controllers\Admin\ACL\PermissionController;
use App\Http\Controllers\Admin\ACL\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AffiliationController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\CourseController;
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

        /** Affiliation */
        Route::get('/affiliation/edit', [AffiliationController::class, 'edit'])->name('affiliation.edit');
        Route::get('/affiliation/edit/social-network', [AffiliationController::class, 'socialNetwork'])->name('affiliation.social');
        Route::put('/affiliation/edit/social-network', [AffiliationController::class, 'socialNetworkStore'])->name('affiliation.social.store');
        Route::get('/affiliation/edit/resume', [AffiliationController::class, 'resume'])->name('affiliation.resume');
        Route::put('/affiliation/edit/resume', [AffiliationController::class, 'resumeStore'])->name('affiliation.resume.store');
        Route::get('/affiliation/edit/brand-images', [AffiliationController::class, 'brandImages'])->name('affiliation.brand');
        Route::put('/affiliations/edit/brand-images', [AffiliationController::class, 'brandImagesStore'])->name('affiliation.brand.store');
        Route::get('/affiliations/destroy/{id}', [AffiliationController::class, 'destroy']);
        Route::resource('affiliations', AffiliationController::class);

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
        /** Courses */
        Route::get('/config/courses/destroy/{id}', [CourseController::class, 'destroy']);
        Route::resource('config/courses', CourseController::class);
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
