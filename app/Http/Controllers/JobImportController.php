<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ProcessJobUpload;
use App\Mail\JobUploadStartedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class JobImportController extends Controller
{
    public function showImportForm()
    {
        return view('admin.job-posts.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls|max:10240', // 10 MB
            'email' => 'required|email',
        ]);

        $path = $request->file('file')->store('imports');

        // Dispatch background job
        ProcessJobUpload::dispatch($path, $request->email);

        // Send “upload started” email
        Mail::to($request->email)->send(new JobUploadStartedMail());

        return back()->with('success', 'Your file has been uploaded! You will receive an email when processing completes.');
    }
}
