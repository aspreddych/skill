<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPost;
use App\Models\Company;
use App\Models\JobCategory;

class HomeController extends Controller
{
    public function home()
    {
        // Companies with active job count (highest first)
        $companies = Company::withCount([
                'jobPosts as active_jobs_count' => function ($query) {
                    $query->where('status', 'active');
                }
            ])
            ->whereHas('jobPosts', function ($query) {
                $query->where('status', 'active');
            })
            ->orderByDesc('active_jobs_count')
            ->take(6)
            ->get(['id', 'name', 'logo']);

        $categories = JobCategory::withCount([
                'jobs as active_jobs_count' => function ($query) {
                    $query->where('status', 'active');
                }
            ])
            ->orderByDesc('active_jobs_count')
            ->take(8)//get only 8 categories to display in homepage
            ->get();

        $latestJobs = JobPost::where('status', 'active')   // only active jobs
                    ->latest('created_at')                    // newest first
                    ->take(8)                                 // limit to 8
                    ->get();

        return view('home', compact('companies', 'categories','latestJobs'));
    }

    public function listAllJobCategories(){
        $categories = JobCategory::withCount([
            'jobs as active_jobs_count' => function ($query) {
                $query->where('status', 'active');
            }
        ])->get();
        return view('job-categories', compact('categories'));
    }

     public function showallactivejobs(){
        $latestJobs = JobPost::where('status', 'active')   // only active jobs
                    ->latest('created_at')                    // newest first
                    ->get();

        return view('active-jobs', compact('latestJobs'));
    }

}
