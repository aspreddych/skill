<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
   protected $fillable = ['name', 'email', 'phone', 'location_id', 'website', 'logo'];

   public function location() {
        return $this->belongsTo(JobLocation::class, 'location_id');
    }
}
