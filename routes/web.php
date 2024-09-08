<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Collector\CollectorController;
use App\Http\Controllers\StandarUser\StandarUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MaterialCategoryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\StandardUserMaterialController;

use App\Http\Controllers\Admin\BagController;
use App\Http\Controllers\Admin\ChartsController;


use App\Http\Controllers\StandarUser\ChartController;

use App\Http\Controllers\StandarUser\HistoryController;
use App\Http\Controllers\StandarUser\RequestController;

use App\Http\Controllers\Collector\RequestsController;
use App\Http\Controllers\Collector\HistoriController;

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
    Route::resource('material_categories', MaterialCategoryController::class);
    Route::resource('materials', MaterialController::class);
    Route::get('/generate-report', [PdfController::class, 'generateReport'])->name('generate.report');
});


Route::middleware('collector')->group(function () {
    Route::get('/collector/dashboard', [CollectorController::class, 'index'])->name('collector.dashboard');

    Route::get('/request', [RequestsController::class, 'index'])->name('requests_collector.index');
    Route::get('/requests/{id}', [RequestsController::class, 'show'])->name('requests_collector.show');

    Route::get('/collector/history', [HistoriController::class, 'index'])->name('history_controller.index');
});


Route::middleware('standard_user')->group(function () {
    Route::get('/standard_user/dashboard', [StandarUserController::class, 'index'])->name('standard_user.dashboard');


    Route::get('/requests', [RequestController::class, 'index'])->name('requests_user.index');

    Route::get('/history', [HistoryController::class, 'index'])->name('history_user.index');
});





route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('bags', BagController::class);
});

Route::get('/chart', [ChartController::class, 'index'])->name('standard_user.chart');

Route::get('/admin/chart', [ChartsController::class, 'index'])->name('admin.chart');

require __DIR__ . '/auth.php';
