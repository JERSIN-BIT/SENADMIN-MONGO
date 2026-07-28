<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ApprenticeController;

Route::resource('areas', AreaController::class);
Route::resource('training-centers', TrainingCenterController::class);
Route::resource('computers', ComputerController::class);
Route::resource('teachers', TeacherController::class);
Route::resource('courses', CourseController::class);
Route::resource('apprentices', ApprenticeController::class);