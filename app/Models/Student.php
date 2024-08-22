<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'father_name',
        'mother_name',
        'father_phone',
        'mother_phone',
        'profile_image',
        'birth_certificate',
        'passport_attachment',
        'academic_certificates',
        'nationality',
        'address',
        'course',
        'preferred_country',
    ];
    
}
