<?php

namespace App\Jobs;

use App\Imports\JobPostsImport;
use App\Mail\JobUploadCompletedMail;
use App\Mail\JobUploadFailedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessJobUpload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filePath;
    protected $email;

    public function __construct($filePath, $email)
    {
        $this->filePath = $filePath;
        $this->email = $email;
    }

    public function handle()
    {
        try {
            $import = new JobPostsImport();
            Excel::import($import, storage_path('app/' . $this->filePath));

            if (!empty($import->failuresLogged)) {
                // Save failures to CSV
                $failuresFile = 'failed_uploads_' . now()->format('Ymd_His') . '.csv';
                $csvData = "Row,Attribute,Error,Values\n";
                foreach ($import->failuresLogged as $fail) {
                    $csvData .= "{$fail['row']},{$fail['attribute']}," . implode('|', $fail['errors']) . "," . json_encode($fail['values']) . "\n";
                }
                Storage::put($failuresFile, $csvData);

                Mail::to($this->email)->send(new JobUploadFailedMail(
                    'Some rows failed during import. Please review attached log.',
                    $failuresFile
                ));
            } else {
                Mail::to($this->email)->send(new JobUploadCompletedMail());
            }
        } catch (\Exception $e) {
            Mail::to($this->email)->send(new JobUploadFailedMail($e->getMessage()));
        }
    }
}
