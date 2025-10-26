<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use App\Models\Company;
use App\Models\JobCategory;
use App\Models\JobLocation;
use Illuminate\Http\Request;

class JobPostController extends Controller
{
    public function index()
    {
        $jobs = JobPost::with(['company', 'category', 'location'])->latest()->get();
        return view('admin.job-posts.index', compact('jobs'));
    }

    public function create()
    {
        $companies = Company::all();
        $categories = JobCategory::all();
        $locations = JobLocation::all();
        return view('admin.job-posts.create', compact('companies', 'categories', 'locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'positions' => 'required|integer|min:1',
            'company_id' => 'required|exists:companies,id',
            'category_id' => 'required|exists:job_categories,id',
            'location_id' => 'required|exists:job_locations,id',
            'employment_type' => 'required|string',
            'job_link' => 'nullable|url',
            'description' => 'required',
        ]);

        JobPost::create($request->all());

        return redirect()->route('job-posts.index')->with('success', 'Job created successfully!');
    }

    public function edit(JobPost $job_post)
    {
        $companies = Company::all();
        $categories = JobCategory::all();
        $locations = JobLocation::all();
        return view('admin.job-posts.edit', compact('job_post', 'companies', 'categories', 'locations'));
    }

    public function update(Request $request, JobPost $job_post)
    {
        $request->validate([
            'title' => 'required',
            'company_id' => 'required|exists:companies,id',
            'category_id' => 'required|exists:job_categories,id',
            'location_id' => 'required|exists:job_locations,id',
            'description' => 'required',
        ]);

        $job_post->update($request->all());

        return redirect()->route('job-posts.index')->with('success', 'Job updated successfully!');
    }

    public function destroy(JobPost $job_post)
    {
        $job_post->delete();
        return redirect()->route('job-posts.index')->with('success', 'Job deleted successfully!');
    }
}
