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
        return view('home', compact('companies', 'categories', 'locations','totalPositions'));
    }

    public function listAllJobCategories(){
        $categories = JobCategory::withCount([
            'jobs as active_jobs_count' => function ($query) {
                $query->where('status', 'active');
            }
        ])->get();
        return view('job-categories', compact('categories'));
    }

}
