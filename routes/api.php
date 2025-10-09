<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstructorController;

// Test route
Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});

//get all instructors
Route::get('/instructors', [App\Http\Controllers\InstructorController::class, 'index']);

//get single instructor
Route::get('/instructors/{id}', [App\Http\Controllers\InstructorController::class, 'show']);

//create instructor
Route::post('/instructors', [App\Http\Controllers\InstructorController::class, 'store']);

//update instructor
Route::put('/instructors/{id}', [App\Http\Controllers\InstructorController::class, 'update']);

//delete instructor
Route::delete('/instructors/{id}', [App\Http\Controllers\InstructorController::class, 'destroy']);


//get all courses
Route::get('/courses', [App\Http\Controllers\CourseController::class, 'index']);

//get single course
Route::get('/courses/{id}', [App\Http\Controllers\CourseController::class, 'show']);

//create course 
Route::post('/courses', [App\Http\Controllers\CourseController::class, 'store']);

//update course
Route::put('/courses/{id}', [App\Http\Controllers\CourseController::class, 'update']);

//delete course
Route::delete('/courses/{id}', [App\Http\Controllers\CourseController::class, 'destroy']);

