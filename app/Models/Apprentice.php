<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Apprentice extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'apprentices';

    protected $fillable = ['name', 'email', 'cell_number', 'course_id', 'computer_id'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function computer()
    {
        return $this->belongsTo(Computer::class, 'computer_id');
    }
}
