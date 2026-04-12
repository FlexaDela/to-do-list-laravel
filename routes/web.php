<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return redirect('/tasks');
});

Route::resource('/tasks', TaskController::class)
    ->except(['show']);

Route::post('/tasks/verificador/{tasks}/', [TaskController::class,'updateChecked'])->name('tasks.updateChecked');