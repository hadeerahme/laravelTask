<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\CourseController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('courses',CourseController::class);
