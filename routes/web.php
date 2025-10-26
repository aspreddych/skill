<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobLocationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\HomeController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/category/addcategory', [JobCategoryController::class, 'create'])->name('admin.job-categories.create');
    Route::get('/admin/company/addcompany', [CompanyController::class, 'create'])->name('admin.company.create');
    Route::get('/admin/job-locations/addlocation', [JobLocationController::class, 'create'])->name('admin.location.create');
    Route::get('/admin/jobs/addpost', [JobPostController::class, 'create'])->name('admin.jobs.create');
    
    Route::resource('/admin/job-categories', JobCategoryController::class);
    Route::resource('/admin/companies', CompanyController::class);
    Route::resource('/admin/job-locations', JobLocationController::class);
    Route::resource('job-posts', JobPostController::class);

});

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/showallcategories', [HomeController::class, 'listAllJobCategories'])->name('showallcategories');
Route::get('/showallactivejobs', [HomeController::class, 'showallactivejobs'])->name('showallactivejobs');

Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::get('/contactus', function () {
    return view('contactus');
});

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});

Route::get('/terms-and-conditions', function () {
    return view('terms-and-conditions');
});

Route::resource('job-categories', JobCategoryController::class);