<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/index', [TaskController::class, 'index'])
    ->name('index');

Route::get('/dashboard', [TaskController::class, 'tachesByUser'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

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


require __DIR__.'/auth.php';
