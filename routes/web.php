<?php

use App\Models\Task;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Symfony\Contracts\Service\Attribute\Required;

Route::get('/', [TaskController::class, 'viewTasks']);

Route::post('/', [TaskController::class, 'createTask']);

Route::patch('/{id}',[TaskController::class, 'updateTask'] );
Route::delete('/{id}',[TaskController::class, 'deleteTask'] );