<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('user', UserController::class);
    Route::resource('employee', \App\Http\Controllers\Admin\EmployeeController::class);
    Route::resource('department', \App\Http\Controllers\Admin\DepartmentController::class);
    Route::resource('task', \App\Http\Controllers\Admin\TaskController::class);
    Route::resource('employee_task', \App\Http\Controllers\Admin\EmployeeTaskController::class);
});
