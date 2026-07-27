<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'teachers';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'training_center_id',
    ];
}
