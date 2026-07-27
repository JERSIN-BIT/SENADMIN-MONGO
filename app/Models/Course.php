<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'courses';

    protected $fillable = [
        'name',
        'code',
        'teacher_id',
    ];
}
