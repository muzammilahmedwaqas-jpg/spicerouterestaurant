<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'manager') {
            return view('dashboard');
        }
        return redirect()->route('staff.dashboard');
    })->name('dashboard');

    Route::get('/staff/dashboard', [AttendanceController::class, 'index'])->name('staff.dashboard');
    Route::post('/check-in', [AttendanceController::class, 'checkIn'])->name('attendance.checkin');
    Route::post('/check-out', [AttendanceController::class, 'checkOut'])->name('attendance.checkout');
    Route::post('/leave-request', [LeaveRequestController::class, 'store'])->name('leave.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'manager'])->group(function () {
    Route::resource('shifts', ShiftController::class);
    Route::resource('employees', EmployeeController::class);
    Route::get('/admin/leaves', [LeaveRequestController::class, 'adminIndex'])->name('admin.leaves');
    Route::patch('/admin/leaves/{leave}', [LeaveRequestController::class, 'updateStatus'])->name('admin.leaves.update');
});

require __DIR__.'/auth.php';