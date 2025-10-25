<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobLocationController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Route::middleware('auth')->prefix('admin')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');
//     })->name('admin.dashboard');

//     Route::prefix('job/category')->group(function () {
//         Route::get('/add', function () {
//             return view('admin.categories.add');
//         })->name('admin.categories.add'); 

//         Route::get('/view', [JobCategoryController::class, 'index'])->name('admin.categories.view');
//     });
// });



Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/category/addcategory', [JobCategoryController::class, 'create'])->name('admin.job-categories.create');
    Route::get('/admin/company/addcompany', [CompanyController::class, 'create'])->name('admin.company.create');
    Route::get('/admin/job-locations/addlocation', [JobLocationController::class, 'create'])->name('admin.location.create');

    Route::resource('/admin/job-categories', JobCategoryController::class);
    Route::resource('/admin/companies', CompanyController::class);
    Route::resource('/admin/job-locations', JobLocationController::class);
});


Route::get('/', function () {
    return view('home');
});

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