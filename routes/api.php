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

