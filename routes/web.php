<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Employee\TaskController as EmployeeTaskController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\QuotationController;
use App\Http\Controllers\Admin\EmployeeController as AdminEmployeeController;
use App\Http\Controllers\Admin\ComplaintController as AdminComplaintController;
use App\Http\Controllers\Customer\ComplaintController as CustomerComplaintController;

// Home Route
Route::view('/', 'welcome')->name('home');

// Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'redirect'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Admin Routes
Route::middleware('role:admin')->prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'admin'])->name('home');

    Route::resource('/complaints', AdminComplaintController::class)->only(['index', 'show']);

    Route::get('/complaint/{id}/reject', [AdminComplaintController::class, 'rejectionForm'])->name('rejection-form');
    Route::post('/complaint/{id}/reject', [AdminComplaintController::class, 'rejectComplaint'])->name('reject-complaint');

    Route::post('/complaint/{id}/close', [AdminComplaintController::class, 'close'])->name('complaint.close');


    Route::get('/complaint/{id}/assign-employee', [AdminComplaintController::class, 'assignEmployeeForm'])->name('assign-employee-form');
    Route::post('/complaint/{id}/assign-employee', [AdminComplaintController::class, 'assignEmployee'])->name('assign-employee');


    Route::resource('employees', AdminEmployeeController::class)->except(['show']);

    Route::get('/complaint/{id}/quote', [QuotationController::class, 'create'])->name('create');
    Route::post('/complaint/{id}/quote', [QuotationController::class, 'store'])->name('store');



});

// Customer Routes
Route::middleware('role:customer')->prefix('/customer')->name('customer.')->group(function () {
    Route::get('/', [DashboardController::class, 'customer'])->name('home');
    Route::view('/contact', 'customer.contact')->name('contact');
    Route::resource('complaints', CustomerComplaintController::class)->only(['index', 'create', 'store', 'show']);
    Route::post('/complaint/{id}/accept', [CustomerComplaintController::class, 'accept'])->name('accept');
    Route::post('/complaint/{id}/reject', [CustomerComplaintController::class, 'reject'])->name('reject');
});

// Employee Routes
Route::middleware('role:employee')->prefix('/employee')->name('employee.')->group(function () {
    Route::get('/', [DashboardController::class, 'employee'])->name('home');
    Route::resource('tasks', EmployeeTaskController::class)->only(['index', 'show']);
    Route::put('task/{id}/start', [EmployeeTaskController::class, 'start'])->name('task.start');
    Route::get('task/{id}/complete', [EmployeeTaskController::class, 'showCompleteForm'])->name('task.complete-form');
    Route::put('task/{id}/complete', [EmployeeTaskController::class, 'completeTask'])->name('task.complete');
    // Route::get('/tasks/pending', [EmployeeController::class, 'pending'])->name('pending');
    // Route::get('/tasks/completed', [EmployeeController::class, 'completed'])->name('completed');
});

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//
