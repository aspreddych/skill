<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
   protected $fillable = ['name', 'email', 'phone', 'location', 'website', 'logo','overview'];

   public function jobPosts()
   {
      return $this->hasMany(JobPost::class, 'company_id');
   }
}

