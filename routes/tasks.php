<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/tasks/index', [TaskController::class, 'index'])
    ->name('tasks.index');

Route::get('/tasks/create', [TaskController::class, 'create'])
    ->name('tasks.create');
    
Route::get('/tasks/taches', [TaskController::class, 'taches'])
    ->name('tasks.taches');
    
Route::post('/tasks', [TaskController::class, 'store'])
    ->name('tasks.store');

Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])
    ->name('tasks.complete');

Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])
    ->name('tasks.destroy');
