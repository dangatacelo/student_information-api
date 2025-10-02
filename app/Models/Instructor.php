<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instructor extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
        'email',
        'phone_number',
        'department',
        'employee_id',
    ];
}
