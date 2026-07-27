<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'computers';

    protected $fillable = [
        'serial',
        'brand',
        'status',
    ];
}
