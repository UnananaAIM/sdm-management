<?php

use App\Http\Controllers\AbsentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama untuk tamu (guest)
Route::get('/', function () {
    return view('welcome');
});

// Route untuk autentikasi (login, register, dll) dari file auth.php
require __DIR__.'/auth.php';

// --- GRUP UNTUK SEMUA USER YANG SUDAH LOGIN & VERIFIKASI EMAIL ---
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Menu Utama
    Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/task', [TaskController::class, 'index'])->name('task.index');
    Route::get('/activity', [ActivityController::class, 'index'])->name('activity.index');
    Route::get('/absent', [LeaveController::class, 'create'])->name('absent.index');
    
    // --- GRUP KHUSUS UNTUK ROLE ADMIN ---
    Route::middleware(['role:Admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
    });

    // --- GRUP KHUSUS UNTUK ROLE PROJECT DIRECTOR & ADMIN ---
    Route::middleware(['role:Admin|Project Director'])->group(function () {
        Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    });

});
