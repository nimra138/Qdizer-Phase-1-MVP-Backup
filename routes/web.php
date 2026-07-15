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
use App\Http\Controllers\BillingController;
use Laravel\Cashier\Http\Controllers\WebhookController;
use App\Http\Controllers\StripeWebhookController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TransactionController;
use App\Mail\SubscriptionActivatedMail;

use Illuminate\Support\Facades\Route;

    
Route::view('/about', 'user.home.about')->name('about');
Route::view('/features', 'user.home.features')->name('features');
Route::view('/pricing', 'user.home.pricing')->name('pricing');
Route::view('/contact', 'user.home.contact')->name('contact');
Route::post('/contact', [ContactController::class,'store'])->name('contact.store');
Route::get('/quote/{token}', [QuotationController::class, 'publicView'])->name('quotation.public');


    Auth::routes(['verify' => true]);
    Route::get('/', function () {
        return view('user.home.index');
        })->name('main');
        
        Route::get('/dashboard', function () {
            return view('user.dashboard.index');
            })->middleware(['auth', 'verified'])->name('dashboard');
            
            Route::middleware(['auth', 'verified'])->group(function () {
                Route::get('/home', [HomeController::class, 'index'])->name('home');
                Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
                Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
                Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
                Route::resource('services', ServiceController::class);
                Route::resource('clients', ClientController::class);
                
                // Route::resource('quotations', QuotationController::class);
                Route::resource('quotations', QuotationController::class) ->except(['create', 'store']);
                Route::get('/quotations/create', [QuotationController::class, 'create'])->middleware('subscription') ->name('quotations.create');
                Route::post('/quotations', [QuotationController::class, 'store'])->middleware('subscription')->name('quotations.store');
                Route::get('/quotation/{quotation}',[QuotationController::class,'show'])->name('quotation.show');
                Route::get('/quotation/{quotation}/download', [QuotationController::class,'download'])->middleware(['auth', 'subscription'])->name('quotation.download');
                Route::get('/quotation/pdfs', [QuotationController::class, 'pdfFiles'])->name('quotation.pdfs');
                
                Route::get('/company-profile/view', [CompanyController::class, 'show'])->name('company.show');
                Route::get('/company-profile', [CompanyController::class, 'edit'])->name('company.edit');
                Route::post('/company-profile', [CompanyController::class, 'update'])->name('company.update');

                Route::get('quotations/{quotation}/template',[QuotationController::class, 'template'])->name('quotations.template');
                Route::get('/subscription', function () {
                    return view('user.subscription.index');
                    })->name('main');


                Route::get('/billing', [BillingController::class, 'index'])->name('billing');
                Route::post('/subscribe', [BillingController::class, 'subscribe'])->name('subscribe');
                Route::get('/billing/success', [BillingController::class, 'success'])->name('billing.success');

                Route::post('/subscribe', [BillingController::class, 'subscribe'])
                    ->name('subscribe');

                Route::get('/billing/success', [BillingController::class, 'success'])
                    ->name('billing.success');

                Route::post('/billing/cancel', [BillingController::class, 'cancel'])
                    ->name('billing.cancel');

                Route::post('/billing/resume', [BillingController::class, 'resume'])
                    ->name('billing.resume');
                
                Route::get('/subscription-expired', function () {
                    return view('user.subscription.expired');
                    })->name('subscription.expired');
                    });
                    

                    Route::post('/stripe/webhook', [
                        WebhookController::class,
                        'handleWebhook',
                    ]);

// Route::middleware('auth')->group(function () {
  
// });

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::get('login', [AdminLoginController::class, 'create'])->name('login');
        Route::post('login', [AdminLoginController::class, 'store']);

        Route::get('register', [AdminRegisterController::class, 'create'])->name('register');
        Route::post('register', [AdminRegisterController::class, 'store']);

        Route::middleware('auth:admin')->group(function () {

            Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
            // user 
            Route::get('/user', [AdminController::class, 'user'])->name('user');
            Route::get('/user/{id}', [AdminController::class, 'show'])->name('users.show');
            Route::get('/contact-messages',[ContactController::class,'index'])->name('contact.index');

            Route::get('/contact-messages/{contactMessage}', [ContactController::class,'show'])->name('contact.show');

            Route::put('/contact-messages/{contactMessage}', [ContactController::class,'update']) ->name('contact.update');

            Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
            Route::get('/transactions/{transaction}', [TransactionController::class, 'show'])->name('transactions.show');

            Route::post('logout', [AdminLoginController::class, 'destroy'])->name('logout');
         });
    });
        
    
        
    

    Route::prefix('admin')->name('admin.')->controller(AdminController::class)->group(function () {

            // Dashboard
            // Route::get('/dashboard', 'dashboard')->name('dashboard');

            // Users
            Route::get('/users', 'user')->name('users');
            Route::get('/users/{id}', 'show')->name('users.show');

            // Clients
            Route::get('/clients', 'clients')->name('clients');
            Route::get('/clients/{id}', [AdminController::class,'showClient'])->name('clients.show');

            // Services
            Route::get('/services', 'services')->name('services');
            Route::get('/services/{id}', [AdminController::class,'showService'])->name('services.show');

            // Quotations
            Route::get('/quotations', 'quotations')->name('quotations');
            Route::get('/quotations/{id}', [AdminController::class,'showQuotation'])->name('quotations.show');

            // Subscriptions
            Route::get('/subscriptions', 'subscriptions')->name('subscriptions');
            Route::get('/subscriptions/{id}',[SubscriptionController::class,'subscriptionsshow'])->name('admin.subscriptions.show');
            // Transactions
            // Route::get('/transactions', 'transactions')->name('transactions');

            // Reports
            Route::get('/reports', 'reports')->name('reports');

            // Settings
            Route::get('/settings', 'settings')->name('settings');
            Route::post('/settings', 'updateSettings')->name('settings.update');

            // Profile
            Route::get('/profile', 'profile')->name('profile');
            Route::post('/profile', 'updateProfile')->name('profile.update');

        }); 
    require __DIR__.'/auth.php';
    Auth::routes();

