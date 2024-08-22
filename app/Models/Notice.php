<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;
    
     // Define the table associated with the model (optional if table name is pluralized by convention)
     protected $table = 'notices';

     // Define the fillable attributes
     protected $fillable = ['title', 'content'];
}
