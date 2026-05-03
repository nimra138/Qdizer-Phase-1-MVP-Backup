<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\AdminRegisterController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('user.home.index');
});
// Route::get('/dash', function () {
//     return view('admin.home.dashboard');
// });
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::prefix('admin')->name('admin.')->group(function () {

    // ✅ PUBLIC ROUTES (NO middleware)
    Route::get('login', [AdminLoginController::class, 'create'])->name('login');
    Route::post('login', [AdminLoginController::class, 'store']);

    Route::get('register', [AdminRegisterController::class, 'create'])->name('register');
    Route::post('register', [AdminRegisterController::class, 'store']);

    // ✅ PROTECTED ROUTES
    Route::middleware('auth:admin')->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.home.dashboard');
        })->name('dashboard');

        Route::post('logout', [AdminLoginController::class, 'destroy'])->name('logout');
    });
});
    
    
require __DIR__.'/auth.php';