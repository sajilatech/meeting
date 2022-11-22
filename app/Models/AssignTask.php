<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignTask extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'task',
            'starttime',
            'endtime',
            'employee_id'
        
    ];
}