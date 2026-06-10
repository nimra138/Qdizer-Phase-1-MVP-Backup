<?php

use App\Http\Controllers\ProfileController;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\AdminRegisterController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\Route;

    
Route::view('/about', 'user.home.coming')->name('about.page');
Route::view('/features', 'user.home.coming')->name('features.page');
Route::view('/pricing', 'user.home.coming')->name('pricing.page');
Route::view('/contact', 'user.home.coming')->name('contact.page');
    Auth::routes(['verify' => true]);
    Route::get('/', function () {
        return view('user.home.index');
        })->name('main');
        
        Route::get('/dashboard', function () {
            return view('user.dashboard.index');
            })->middleware(['auth', 'verified'])->name('dashboard');
            
            Route::middleware(['auth', 'trial'])->group(function () {
                Route::get('/home', [HomeController::class, 'index'])->name('home');
                Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
                Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
                Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
                Route::resource('services', ServiceController::class);
                Route::resource('clients', ClientController::class);
                Route::resource('quotations', QuotationController::class);
                // Route::get('/company', [CompanyController::class, 'index'])->name('company.index');
                Route::get('/company-profile/view', [CompanyController::class, 'show'])->name('company.show');
                Route::get('/company-profile', [CompanyController::class, 'edit'])->name('company.edit');
                Route::post('/company-profile', [CompanyController::class, 'update'])->name('company.update');
                Route::get('quotations/{id}/template',[QuotationController::class, 'template'])->name('quotations.template');
                Route::get('/subscription-expired', function () {
                    return view('user.subscription.expired');
                })->name('subscription.expired');
            });
                


    Route::prefix('admin')->name('admin.')->group(function () {

        Route::get('login', [AdminLoginController::class, 'create'])->name('login');
        Route::post('login', [AdminLoginController::class, 'store']);

        Route::get('register', [AdminRegisterController::class, 'create'])->name('register');
        Route::post('register', [AdminRegisterController::class, 'store']);

        Route::middleware('auth:admin')->group(function () {

            Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
            // user 
            Route::get('/user', [AdminController::class, 'user'])->name('user');
            Route::get('/user/{id}', [AdminController::class, 'show'])
            ->name('users.show');

            Route::post('logout', [AdminLoginController::class, 'destroy'])->name('logout');
        });
    });
        
        
    require __DIR__.'/auth.php';
    Auth::routes();

