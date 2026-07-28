<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Teacher extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'teachers';

    protected $fillable = [
        'name',
        'email',
        'area_id',
        'training_center_id',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function trainingCenter()
    {
        return $this->belongsTo(TrainingCenter::class, 'training_center_id');
    }
}