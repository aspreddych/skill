<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    public function index()
    {
        $categories = JobCategory::all();
        return view('job_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('job_categories.create');
    }

    public function store(Request $request)
    {
        //dd($request);
        try {
            $request->validate([
                'name' => 'required|unique:job_categories,name',
                'description' => 'nullable|string',
            ]);

            JobCategory::create($request->only(['name', 'description']));

            return redirect()
                ->route('admin.categories.add')
                ->with('success', 'Category added successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // This handles validation errors separately (already shown via @error)
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // This shows the actual database or runtime error message
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    public function edit(JobCategory $jobCategory)
    {
        return view('job_categories.edit', compact('jobCategory'));
    }

    public function update(Request $request, JobCategory $jobCategory)
    {
        $request->validate([
            'name' => 'required|unique:job_categories,name,' . $jobCategory->id,
            'description' => 'nullable|string',
        ]);

        $jobCategory->update($request->only(['name', 'description']));

        return redirect()->route('job-categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(JobCategory $jobCategory)
    {
        $jobCategory->delete();
        return redirect()->route('job-categories.index')->with('success', 'Category deleted successfully!');
    }
}
