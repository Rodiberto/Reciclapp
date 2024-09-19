<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BagController;
use App\Http\Controllers\Admin\ChartsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MaterialCategoryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PdfController;

use App\Http\Controllers\Collector\CollectorController;
use App\Http\Controllers\Collector\RequestsController;
use App\Http\Controllers\Collector\HistoriController;
use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\StandarUser\StandarUserController;
use App\Http\Controllers\StandarUser\ChartController;
use App\Http\Controllers\StandarUser\HistoryController;
use App\Http\Controllers\StandarUser\RequestController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiciosController;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::middleware(['auth', 'check.activity'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('admin', 'check.activity')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('users', UserController::class)->middleware('auth');
    Route::resource('materials', MaterialController::class);
    Route::resource('material_categories', MaterialCategoryController::class);
    Route::resource('bags', BagController::class);
    Route::get('/generate-report', [PdfController::class, 'generateReport'])->name('generate.report');
    Route::get('/admin/chart', [ChartsController::class, 'index'])->name('admin.chart');
});


Route::middleware('collector', 'check.activity')->group(function () {
    Route::get('/collector/dashboard', [CollectorController::class, 'index'])->name('collector.dashboard');
    Route::get('/request', [RequestsController::class, 'index'])->name('requests_collector.index');
    Route::get('/requests/{id}', [RequestsController::class, 'show'])->name('requests_collector.show');
    Route::get('/collector/history', [HistoriController::class, 'index'])->name('history_controller.index');
});


Route::middleware('standard_user', 'check.activity')->group(function () {
    Route::get('/standard_user/dashboard', [StandarUserController::class, 'index'])->name('standard_user.dashboard');
    Route::get('/requests', [RequestController::class, 'index'])->name('requests_user.index');
    Route::get('/history', [HistoryController::class, 'index'])->name('history_user.index');
    Route::get('/chart', [ChartController::class, 'index'])->name('standard_user.chart');
});



Route::post('/contact/send', [ContactController::class, 'sendContactEmail'])->name('contact.send');

Route::get('/servicios', [ServiciosController::class, 'index'])->name('servicios');
Route::get('/contactanos', [ContactanosController::class, 'index'])->name('contactanos');


require __DIR__ . '/auth.php';
