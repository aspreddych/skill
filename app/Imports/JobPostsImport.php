<?php

namespace App\Imports;

use App\Models\JobPost;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Contracts\Queue\ShouldQueue;

class JobPostsImport implements 
    ToModel, 
    WithHeadingRow, 
    WithChunkReading, 
    WithBatchInserts, 
    WithValidation, 
    SkipsOnFailure, 
    ShouldQueue
{
    use SkipsFailures;

    public $failuresLogged = [];

    public function model(array $row)
    {
        return new JobPost([
            'title'        => $row['title'],
            'company_id'   => $row['company_id'],
            'category_id'  => $row['category_id'],
            'location_id'  => $row['location_id'],
            'description'  => $row['description'],
            'status'       => $row['status'] ?? 'active',
            'positions'    => $row['positions'] ?? 1,
        ]);
    }

    public function rules(): array
    {
        return [
            '*.title' => 'required|string|max:255',
            '*.company_id' => 'required|integer|exists:companies,id',
            '*.category_id' => 'required|integer|exists:job_categories,id',
            '*.location_id' => 'required|integer|exists:job_locations,id',
        ];
    }

    public function onFailure(...$failures)
    {
        foreach ($failures as $failure) {
            $this->failuresLogged[] = [
                'row' => $failure->row(),
                'attribute' => $failure->attribute(),
                'errors' => $failure->errors(),
                'values' => $failure->values(),
            ];
        }

        // Also log them to storage/logs/laravel.log
        Log::error('Job Import Row Failure', $this->failuresLogged);
    }

    public function chunkSize(): int { return 1000; }
    public function batchSize(): int { return 1000; }
}
