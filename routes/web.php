<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('user-not-logged')->group(function () {
    Route::get('/login',[UserController::class,'login'])->name('login');
    Route::post('/login',[UserController::class,'loginConfirm'])->name('singIn');
    Route::get('/registrar',[UserController::class,'register'])->name('register');
    Route::post('/registrar',[UserController::class,'registerConfirm'])->name('registerConfirm');
    });
    
Route::middleware('user-logged')->group(function() {
    Route::get('/', function() {
        return redirect('/tasks');
        });
    Route::resource('/tasks', TaskController::class);
    Route::patch('/tasks/verificador/{task}/', [TaskController::class,'updateChecked'])->name('tasks.updateChecked');
    Route::post('/logout',[UserController::class,'logout'])->name('logout');
});