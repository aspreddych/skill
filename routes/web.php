<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobImportController;
use App\Http\Controllers\BulkJobController;
use App\Http\Controllers\TrendController;
use App\Models\JobUpload;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/category/addcategory', [JobCategoryController::class, 'create'])->name('admin.job-categories.create');
    Route::get('/admin/company/addcompany', [CompanyController::class, 'create'])->name('admin.company.create');
    Route::get('/admin/jobs/addpost', [JobPostController::class, 'create'])->name('admin.jobs.create');
    
    Route::resource('/admin/job-categories', JobCategoryController::class);
    Route::resource('/admin/companies', CompanyController::class);
    Route::resource('job-posts', JobPostController::class);

    Route::get('/admin/jobs/import', [JobImportController::class, 'showImportForm'])->name('jobs.import.form');
    Route::post('/admin/jobs/import', [JobImportController::class, 'import'])->name('jobs.import');

    Route::get('/admin/jobs/upload', [BulkJobController::class, 'create']);
    Route::post('/admin/jobs/upload', [BulkJobController::class, 'store'])->name('jobs.upload');
    Route::get('/admin/job-upload/{id}/progress', function ($id) {
            return JobUpload::select(
                'total_rows',
                'processed_rows',
                'failed_rows',
                'status'
            )->findOrFail($id);
        });

    // Bulk Upload list page
    Route::get('/admin/job-uploads', [BulkJobController::class, 'index'])->name('job.uploads.list');
    Route::get('/admin/job-uploads/{upload}/failures', [BulkJobController::class, 'failures'])->name('job.upload.failures');

    Route::post('/admin/job-uploads/{upload}/retry-failures',[BulkJobController::class, 'retryFailures'])->name('job.upload.retry');
    Route::get('/admin/job-uploads/{upload}/failures/download',[BulkJobController::class, 'downloadFailures'])->name('job.upload.failures.download');

});

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/showallcategories', [HomeController::class, 'listAllJobCategories'])->name('showallcategories');
Route::get('/showallactivejobs', [HomeController::class, 'showallactivejobs'])->name('showallactivejobs');
Route::get('/job/{id}', [JobPostController::class, 'show'])->name('landing.job.show');
 

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

// job trends
Route::get('/job-trends', [TrendController::class, 'index']);
Route::get('/job-trends/data', [TrendController::class, 'getData']);