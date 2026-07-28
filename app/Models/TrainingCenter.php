<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class TrainingCenter extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'training_centers';

    protected $fillable = [
        'name',
        'location',
    ];
}