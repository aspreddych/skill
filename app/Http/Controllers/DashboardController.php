<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobCategory;
use App\Models\Company;
use App\Models\JobLocation;
use App\Models\JobPost;


class DashboardController extends Controller
{
    public function dashboard()
    {
        $data = [
            'jobCategoriesCount' => JobCategory::count(),
            'companiesCount' => Company::count(),
            'locationsCount' => JobLocation::count(),
            'activeJobsCount' => JobPost::where('status', 'active')->count(),
        ];

        return view('admin.dashboard', $data);
    }
}
