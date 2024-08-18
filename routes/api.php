<?php

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
