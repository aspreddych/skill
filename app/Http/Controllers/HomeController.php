<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPost;
use App\Models\Company;
use App\Models\JobCategory;
use App\Models\JobLocation;

class HomeController extends Controller
{
    public function home()
    {
        $companies = Company::all();
        $categories = JobCategory::withCount([
                'jobs as active_jobs_count' => function ($query) {
                    $query->where('status', 'active');
                }
            ])
            ->orderByDesc('active_jobs_count')
            ->take(8)//get only 8 categories to display in homepage
            ->get();
        $locations = JobLocation::all();
        $totalPositions = JobPost::sum('positions');

        $latestJobs = JobPost::where('status', 'active')   // only active jobs
                    ->latest('created_at')                    // newest first
                    ->take(8)                                 // limit to 8
                    ->get();

        return view('home', compact('companies', 'categories', 'locations','totalPositions','latestJobs'));
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
