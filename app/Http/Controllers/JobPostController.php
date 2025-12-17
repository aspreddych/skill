<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use App\Models\Company;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class JobPostController extends Controller
{
    public function index()
    {
        $jobs = JobPost::with(['company', 'category'])->latest()->get();
        return view('admin.job-posts.index', compact('jobs'));
    }

    public function create()
    {
        $companies = Company::all();
        $categories = JobCategory::all();
        return view('admin.job-posts.create', compact('companies', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'salary' => 'required',
            'company_id' => 'required|exists:companies,id',
            'category_id' => 'required|exists:job_categories,id',
            'location' => 'required',
            'employment_type' => 'required|string',
            'education_qualification' => 'required|string',
            'job_link' => 'nullable|url',
            'experience_required' => 'required',
            'skills' => 'required',
            'responsibilities' => 'required',
        ]);

        $data = $request->all();

        // Capitalize every word in location
        $data['title'] = Str::title(trim($request->title));
        $data['location'] = Str::title(trim($request->location));

        JobPost::create($data);

        return redirect()->route('job-posts.index')->with('success', 'Job created successfully!');
    }

    public function edit(JobPost $job_post)
    {
        $companies = Company::all();
        $categories = JobCategory::all();
        return view('admin.job-posts.edit', compact('job_post', 'companies', 'categories'));
    }

    public function update(Request $request, JobPost $job_post)
    {
        $request->validate([
            'title' => 'required',
            'company_id' => 'required|exists:companies,id',
            'category_id' => 'required|exists:job_categories,id',
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

    public function show($id)
    {
        $job = JobPost::with(['company', 'category'])->findOrFail($id);

        // Fetch other active jobs from the same company
        $relatedJobs = JobPost::where('company_id', $job->company_id)
            ->where('id', '!=', $job->id)    // Exclude current job
            ->where('status', 'active')
            ->limit(6)
            ->get();

        $schema = [
            "@context" => "https://schema.org",
            "@type" => "JobPosting",
            "title" => $job->title,
            "description" => strip_tags($job->responsibilities),
            "datePosted" => $job->created_at->toDateString(),
            "validThrough" => $job->expiry_date
                ? $job->expiry_date->toIso8601String()
                : now()->addDays(30)->toIso8601String(),
            "employmentType" => strtoupper($job->employment_type), // FULL_TIME
            "hiringOrganization" => [
                "@type" => "Organization",
                "name" => $job->company->name,
                "sameAs" => $job->company->website,
                "logo" => asset($job->company->logo),
            ],
            "jobLocation" => [
                "@type" => "Place",
                "address" => [
                    "@type" => "PostalAddress",
                    "addressLocality" => $job->location,
                    "addressCountry" => $job->location,
                ],
            ],
            "baseSalary" => [
                "@type" => "MonetaryAmount",
                "currency" => "USD",
                "value" => [
                    "@type" => "QuantitativeValue",
                    "minValue" => $job->salary,
                    "maxValue" => $job->salary,
                    "unitText" => "YEAR",
                ],
            ],
            "applyUrl" => route('landing.job.show', $job->id),
        ];

        return view('view-job', compact('job', 'relatedJobs','schema'));
    }

}
