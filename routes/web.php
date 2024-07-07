<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Collector\CollectorController;
use App\Http\Controllers\StandarUser\StandarUserController;

Route::get('/', function () {
    return view('home');
})->name('home');

// Rutas para el dashboard

/*Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});*/





// Rutas para el perfil
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





// Rutas protegidas por el middleware 'admin'
Route::middleware('admin')->group(function () {
    // Ruta para el panel de administrador
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // Otras rutas para administradores
});
 ///
// Rutas protegidas por el middleware 'recolector'
Route::middleware('collector')->group(function () {
    Route::get('/collector/dashboard', [CollectorController::class, 'index'])->name('collector.dashboard');
});

// Rutas protegidas por el middleware 'standard_user'
Route::middleware('standard_user')->group(function () {
    Route::get('/standard_user/dashboard', [StandarUserController::class, 'index'])->name('standard_user.dashboard');
});



require __DIR__.'/auth.php';
