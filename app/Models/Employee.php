<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'address', 'emergency_contact_name',
        'emergency_contact_phone', 'department', 'job_title', 'manager', 'employment_type',
        'status', 'start_date', 'end_date', 'date_of_birth', 'gender', 'nationality',
        'salary', 'currency', 'bank_account_number', 'photo', 'notes'
    ];
}
