<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Collector\CollectorController;
use App\Http\Controllers\StandarUser\StandarUserController;
use App\Http\Controllers\UserController;





Route::get('/', function () {
    return view('home');
})->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('users', UserController::class)->middleware('auth');
});


Route::middleware('collector')->group(function () {
    Route::get('/collector/dashboard', [CollectorController::class, 'index'])->name('collector.dashboard');
});

Route::middleware('standard_user')->group(function () {
    Route::get('/standard_user/dashboard', [StandarUserController::class, 'index'])->name('standard_user.dashboard');
});






require __DIR__.'/auth.php';
