<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\AuthCustomMiddleware;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/nosotros', [HomeController::class, 'about'])->name('about');
Route::get('/simulacion', [HomeController::class, 'simulation'])->name('simulation');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/registro', [AuthController::class, 'showRegister'])->name('register');
Route::post('/registro', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware([AuthCustomMiddleware::class])->group(function () {
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
    Route::get('/posts/crear', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/editar', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});