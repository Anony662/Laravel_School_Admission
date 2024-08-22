<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Specify the table if it's not the plural form of the model name
    protected $table = 'courses';

    // Fillable attributes
    protected $fillable = [
        'course_name',
        'description',
        'department',
        'semester',
        'year',
        'instructor',
        'status',
    ];
}
