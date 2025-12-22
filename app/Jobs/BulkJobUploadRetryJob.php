<?php
namespace App\Jobs;

use App\Models\{JobPost, JobUploadFailure, Company, JobCategory};
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class BulkJobUploadRetryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public int $uploadId,
        public array $row,
        public int $failureId
    ) {}

    public function handle()
    {
        try {
            // 👉 Reuse SAME insert logic you already wrote
            // If success → delete failure
            JobUploadFailure::where('id', $this->failureId)->delete();

        } catch (Exception $e) {
            // Update error message
            JobUploadFailure::where('id', $this->failureId)
                ->update(['error' => $e->getMessage()]);
        }
    }
}
