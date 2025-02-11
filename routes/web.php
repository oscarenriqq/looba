<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectManagementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GitHubAuthController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projects/create', [ProjectManagementController::class, 'index'])->name('projects.index');
Route::post('/projects/create', [ProjectManagementController::class, 'store'])->name('projects.store');

//Autenticación GitHub
Route::get('/auth/login', [GitHubAuthController::class, 'redirectToProvider'])->name('login.github');
Route::get('/auth/callback', [GitHubAuthController::class, 'handleProviderCallback'])->name('callback.github');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/auth/logout', [GitHubAuthController::class, 'logout'])->name('logout');
});