<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprentice extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'apprentices';

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'phone',
        'course_id',
        'computer_id',
    ];
}
