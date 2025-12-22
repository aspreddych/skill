<?php

namespace App\Jobs;

use App\Models\Company;
use App\Models\JobUpload;
use App\Models\JobUploadFailure;
use App\Models\JobCategory;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\LazyCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobUploadCompletedMail;
use Exception;

class BulkJobUploadJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public int $uploadId) {}

    public function handle()
    {
        DB::disableQueryLog();

        $upload = JobUpload::findOrFail($this->uploadId);
        $upload->update(['status' => 'processing']);

        $path = storage_path('app/private/' . $upload->file);

        if (!file_exists($path)) {
            \Log::error('CSV not found', ['path' => $path]);
            throw new Exception("CSV file not found: {$path}");
        }

       $companyMap = Company::pluck('id', 'name')->mapWithKeys(fn ($id, $name) => [strtolower(trim($name)) => $id]);
       $categoryMap = JobCategory::pluck('id', 'name')->mapWithKeys(fn ($id, $name) => [strtolower(trim($name)) => $id]);


        /* ---------- COUNT TOTAL ROWS ---------- */
        $handle = fopen($path, 'r');
        fgetcsv($handle);
        $totalRows = 0;
        while (fgetcsv($handle)) {
            $totalRows++;
        }
        fclose($handle);

        $upload->update(['total_rows' => $totalRows]);

        /* ---------- PROCESS CSV ---------- */
        LazyCollection::make(function () use ($path) {
            $handle = fopen($path, 'r');
            $header = fgetcsv($handle);

            while (($row = fgetcsv($handle)) !== false) {
                if (count($row) !== count($header)) {
                    continue; // skip malformed rows
                }
                yield array_combine($header, $row);
            }
            fclose($handle);
        })
        ->chunk(1000)
        ->each(function ($chunk) use ($upload, $companyMap, $categoryMap) {

            DB::beginTransaction();
            

            try {
                $insert = [];

                foreach ($chunk as $row) {

                    $row = array_map('trim', $row);

                    if (empty($row['title']) || empty($row['company']) || empty($row['category'])) {
                        throw new Exception('Missing required fields');
                    }

                    $companyKey  = strtolower($row['company']);
                    $categoryKey = strtolower($row['category']);

                    /* ---------- COMPANY ---------- */
                    if (!isset($companyMap[$companyKey])) {
                        $company = Company::create([
                            'name' => $row['company'],
                            'status' => 'active',
                        ]);

                        $companyMap[$companyKey] = $company->id;
                    }

                    $companyId = $companyMap[$companyKey];

                    /* ---------- CATEGORY ---------- */
                    if (!isset($categoryMap[$categoryKey])) {
                        $category = JobCategory::create([
                            'name' => $row['category'],
                            'status' => 'active',
                        ]);

                        $categoryMap[$categoryKey] = $category->id;
                    }

                    $categoryId = $categoryMap[$categoryKey];



                    if (
                        empty($row['title']) ||
                        !isset($companyId) ||
                        !isset($categoryId)
                    ) {
                        throw new Exception('Invalid row or foreign key');
                    }

                    $insert[] = [
                        'title' => trim($row['title']),
                        'company_id' => $companyId,
                        'category_id' => $categoryId ,
                        'location' => $row['location'],
                        'salary' => $row['salary'],
                        'employment_type' => $row['employment_type'],
                        'job_link' => $row['job_link'],
                        'education_qualification' => $row['education_qualification'],
                        'experience_required' => $row['experience_required'],
                        'skills' => $row['skills'],
                        'responsibilities' => $row['responsibilities'],
                        'status' => $row['status'] ?? 'active',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }

                if ($insert) {
                    DB::table('job_posts')->insert($insert);
                    $upload->increment('processed_rows', count($insert));
                }

                DB::commit();

            } catch (Exception $e) {
                DB::rollBack();

                foreach ($chunk as $row) {
                   JobUploadFailure::create([
                        'job_upload_id' => $upload->id,
                        'row_data' => json_encode($row, JSON_UNESCAPED_UNICODE),
                        'error' => $e->getMessage(),
                    ]);
                }

                $upload->increment('failed_rows', count($chunk));
            }
        });

        /* ---------- FINALIZE ---------- */
        $upload->update(['status' => 'completed']);

        Mail::to($upload->email)
            ->queue(new JobUploadCompletedMail($upload));
    }
}
