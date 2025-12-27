<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\UserProfileController; // New import
use App\Http\Controllers\ContactController; // New import
use App\Http\Controllers\AdminImeiTrackerController; // New import

Route::get('/', fn() => view('auth.login'))->name('login');

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// General dashboard route - will be unused if role-based redirection works
// Route::get('/dashboard', fn() => view('dashboard'))->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/manager/dashboard', function () {
        return view('manager_dashboard');
    })->name('manager.dashboard');

    Route::get('/user/dashboard', function () {
        return view('user_dashboard');
    })->name('user.dashboard');

    Route::get('/user/profile', [UserProfileController::class, 'index'])->name('user.profile'); // New profile route

    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index'); // New contact route
});

// Admin specific routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin_dashboard');
    })->name('admin.dashboard');

    // Export/Import routes
    Route::get('admin/users/export', [AdminUserController::class, 'export'])->name('admin.users.export');
    Route::post('admin/users/import', [AdminUserController::class, 'import'])->name('admin.users.import');

    Route::resource('admin/users', AdminUserController::class)->names('admin.users');

    // IMEI Tracker Routes
    Route::get('admin/imei-tracker/export', [AdminImeiTrackerController::class, 'export'])->name('admin.imei-tracker.export');
    Route::post('admin/imei-tracker/import', [AdminImeiTrackerController::class, 'import'])->name('admin.imei-tracker.import');
    Route::get('admin/imei-tracker/template', [AdminImeiTrackerController::class, 'emptyTemplate'])->name('admin.imei-tracker.template');
    Route::delete('admin/imei-tracker/truncate', [AdminImeiTrackerController::class, 'truncate'])->name('admin.imei-tracker.truncate');
    Route::resource('admin/imei-tracker', AdminImeiTrackerController::class)->names('admin.imei-tracker');
});
