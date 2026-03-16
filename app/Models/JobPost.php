<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    protected $table = 'job_posts';

    protected $fillable = [
        'title','company_id', 'category_id', 'location', 'salary', 'employment_type', 'job_link',
        'education_qualification', 'experience_required', 'status', 'skills', 'responsibilities','expiry_date'
    ];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function category() {
        return $this->belongsTo(JobCategory::class, 'category_id');
    }
}
