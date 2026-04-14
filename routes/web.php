<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\UsuarioCadastrado;
use Illuminate\Support\Facades\Route;

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'loginConfirm'])->name('singIn');
Route::get('/registrar',[UserController::class,'register'])->name('register');
Route::post('/registrar',[UserController::class,'registerConfirm'])->name('registerConfirm');
Route::post('/logout',[UserController::class,'logout'])->name('logout');

Route::get('/', function() {
    return redirect('/tasks');
})->middleware(UsuarioCadastrado::class);

Route::resource('/tasks', TaskController::class)->middleware(UsuarioCadastrado::class);

Route::patch('/tasks/verificador/{task}/', [TaskController::class,'updateChecked'])->name('tasks.updateChecked')
->middleware(UsuarioCadastrado::class);