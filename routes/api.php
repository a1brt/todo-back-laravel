<?php

use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\TaskListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::patch('task_lists/bulk', [TaskListController::class,'bulkUpdate']);

Route::resource('task_lists.tasks', TaskController::class)->except(['edit, create']);

Route::resource('task_lists', TaskListController::class)->except(['edit, create']);





