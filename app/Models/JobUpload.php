<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobPost;

class JobUpload extends Model
{
    protected $fillable = [
        'user_id', 'file', 'email','total_rows',
        'processed_rows', 'failed_rows', 'status'
    ];
}
