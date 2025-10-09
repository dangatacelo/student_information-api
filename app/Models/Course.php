<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
  protected $fillable = [
        'course_code',
        'course_name',
        'description',
        'units',
        'department',
        'instructor_id',
  ];
}
