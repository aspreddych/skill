<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    protected $table = 'job_posts';

    protected $fillable = [
        'title', 'positions' ,'company_id', 'category_id', 'location_id', 'salary', 'description', 'requirements', 'status'
    ];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function category() {
        return $this->belongsTo(JobCategory::class, 'category_id');
    }

    public function location() {
        return $this->belongsTo(JobLocation::class, 'location_id');
    }
}
