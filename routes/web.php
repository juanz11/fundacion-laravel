<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Rutas públicas
Route::get('/', function () {
    return view('home');
});

Route::get('/quienes-somos', function () {
    return view('quienes-somos');
});

Route::get('/programas', function () {
    return view('programas');
});

Route::get('/contacto', function () {
    return view('contacto');
});

// Rutas de autenticación
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Rutas de administración (solo para admins)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::patch('/users/{user}/role', [AdminController::class, 'updateUserRole'])->name('users.update-role');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('users.delete');
    
    // Rutas de medios
    Route::get('/media', [\App\Http\Controllers\MediaController::class, 'index'])->name('media.index');
    Route::post('/media/upload', [\App\Http\Controllers\MediaController::class, 'upload'])->name('media.upload');
    Route::patch('/media/{media}', [\App\Http\Controllers\MediaController::class, 'update'])->name('media.update');
    Route::delete('/media/{media}', [\App\Http\Controllers\MediaController::class, 'destroy'])->name('media.destroy');
    Route::get('/media/{media}/download', [\App\Http\Controllers\MediaController::class, 'download'])->name('media.download');
});
