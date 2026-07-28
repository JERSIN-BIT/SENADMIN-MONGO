<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Computer extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'computers';

    protected $fillable = [
        'number',
        'brand',
    ];
}