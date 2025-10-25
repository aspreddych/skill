<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobLocation;

class JobLocationController extends Controller
{
    public function index()
    {
        $locations = JobLocation::all();
        return view('admin.job-locations.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.job-locations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:job_locations,name',
        ]);

        JobLocation::create($request->all());

        return redirect()->route('job-locations.index')
                         ->with('success', 'Job Location added successfully.');
    }

    public function edit(JobLocation $jobLocation)
    {
        return view('admin.job-locations.edit', compact('jobLocation'));
    }

    public function update(Request $request, JobLocation $jobLocation)
    {
        $request->validate([
            'name' => 'required|unique:job_locations,name,' . $jobLocation->id,
        ]);

        $jobLocation->update($request->all());

        return redirect()->route('job-locations.index')
                         ->with('success', 'Job Location updated successfully.');
    }

    public function destroy(JobLocation $jobLocation)
    {
        $jobLocation->delete();
        return redirect()->route('job-locations.index')
                         ->with('success', 'Job Location deleted successfully.');
    }
}
