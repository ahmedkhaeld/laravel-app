<?php

use App\Http\Controllers\Api\SchoolManagement\ClassRoomController;
use App\Http\Controllers\Api\SchoolManagement\SchoolController;
use App\Http\Controllers\Api\SchoolManagement\StudentController;
use App\Http\Controllers\Api\SchoolManagement\SubjectController;
use App\Http\Controllers\Api\SchoolManagement\TeacherController;
use App\Http\Controllers\Api\Tasks\CompleteTaskController;
use App\Http\Controllers\Api\Tasks\TasksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('tasks')->group(function () {
    Route::apiResource('', TasksController::class)->parameters([
        '' => 'task'
    ]);
    Route::patch('{task}/complete', CompleteTaskController::class);
});


Route::apiResource('schools', SchoolController::class);
Route::apiResource('classrooms', ClassRoomController::class);
Route::apiResource('students', StudentController::class);
Route::apiResource('teachers', TeacherController::class);
Route::apiResource('subjects', SubjectController::class);
