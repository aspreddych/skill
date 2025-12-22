<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobPost;

class JobUploadFailure extends Model
{
    protected $fillable = ['job_upload_id', 'row_data', 'error'];

     protected $casts = [
        'row_data' => 'array',
    ];
}