<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectManagementController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projects/create', [ProjectManagementController::class, 'index'])->name('projects.index');
Route::post('/projects/create', [ProjectManagementController::class, 'store'])->name('projects.store');
