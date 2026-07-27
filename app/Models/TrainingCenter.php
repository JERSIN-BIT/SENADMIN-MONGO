<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingCenter extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'training_centers';

    protected $fillable = [
        'name',
        'address',
    ];
}
