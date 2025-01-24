<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TrackController;

Route::resource('students', StudentController::class);
Route::resource('courses', CourseController::class);
Route::resource('tracks', TrackController::class);