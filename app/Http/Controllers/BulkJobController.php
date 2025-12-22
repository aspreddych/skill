<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobUpload;
use App\Jobs\BulkJobUploadJob;
use App\Models\JobUploadFailure;
use App\Jobs\BulkJobUploadRetryJob;
use Symfony\Component\HttpFoundation\StreamedResponse;

class BulkJobController extends Controller
{
    public function create()
    {
        return view('admin.jobs.upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:51200', // 50MB
        ]);

        $path = $request->file('file')->store('job-uploads');

        $upload = JobUpload::create([
            'user_id' => auth()->id(),
            'file' => str_replace('private/', '', $path),
            'email'   => $request->email,
            'status' => 'pending',
        ]);

        BulkJobUploadJob::dispatch($upload->id);

        return redirect()
            ->route('jobs.import.form')
            ->with('upload_id', $upload->id)
            ->with('success', 'Jobs upload started. Processing in background.');
    }


    public function index()
    {
        $uploads = JobUpload::latest()->paginate(20);

        return view('admin.job-posts.bulkpost-index', compact('uploads'));
    }

     /**
     * Show failed rows for one upload
     */
    public function failures($uploadId)
    {
        $failures = JobUploadFailure::where('job_upload_id', $uploadId)
            ->latest()
            ->paginate(50);

        return view('admin.job-posts.failures', compact('failures', 'uploadId'));
    }

    /**
     * Retry failed rows
     */
    public function retryFailures($uploadId)
    {
        $failures = JobUploadFailure::where('job_upload_id', $uploadId)->get();

        foreach ($failures as $failure) {
            dispatch(new BulkJobUploadRetryJob(
                $uploadId,
                json_decode($failure->row_data, true),
                $failure->id
            ));
        }

        return back()->with('success', 'Retry started for failed rows');
    }

    public function downloadFailures($uploadId)
    {
        $fileName = "job_upload_{$uploadId}_failed_rows.csv";

        return response()->streamDownload(function () use ($uploadId) {

            $handle = fopen('php://output', 'w');

            // Get first failure to extract headers
            $firstFailure = JobUploadFailure::where('job_upload_id', $uploadId)->first();

            if (!$firstFailure) {
                // No failures → just output empty file
                fclose($handle);
                return;
            }

            $firstRow = json_decode($firstFailure->row_data, true) ?? [];

            // Dynamic headers from CSV row
            $headers = array_keys($firstRow);

            // Add system columns
            $headers[] = 'error';
            $headers[] = 'failed_at';

            // Write header
            fputcsv($handle, $headers);

            // Stream all failures
            JobUploadFailure::where('job_upload_id', $uploadId)
                ->orderBy('id')
                ->chunk(1000, function ($failures) use ($handle, $headers) {

                    foreach ($failures as $failure) {
                        $rowData = json_decode($failure->row_data, true) ?? [];

                        $csvRow = [];

                        foreach ($headers as $column) {
                            if ($column === 'error') {
                                $csvRow[] = $failure->error;
                            } elseif ($column === 'failed_at') {
                                $csvRow[] = $failure->created_at;
                            } else {
                                $csvRow[] = $rowData[$column] ?? '';
                            }
                        }

                        fputcsv($handle, $csvRow);
                    }
                });

            fclose($handle);

        }, $fileName, [
            'Content-Type' => 'text/csv',
        ]);
    }



}
