<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;

Route::resource('areas', AreaController::class);
