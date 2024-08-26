<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MpesaSTKPUSHController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [PageController::class, 'index']);
Route::get('/layout', [PageController::class, 'layout']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/blog', [PageController::class, 'blog']);

Route::get('/information', [PageController::class, 'information']);
Route::get('/support', [PageController::class, 'support']);
Route::get('/register', [PageController::class, 'register']);
Route::post('register', [PageController::class, 'register'])->name('register.store');

Route::get('/login', [PageController::class, 'login']);
Route::get('/contactus', [PageController::class, 'contactus']);

Route::post('register-submit', [PageController::class, 'submitregister'])->name('register.submit');

Route::post('/contact-submit', [PageController::class, 'submitContact'])->name('contact.submit');
Route::post('/login-submit', [PageController::class, 'submitlogin'])->name('login.submit');


Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/test-create-user', [UserController::class, 'testCreateUser']);

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::post('/profile/update-payment-plan', [ProfileController::class, 'updatePaymentPlan'])->name('profile.update-payment-plan');
Route::get('/profile/payment-plan', [ProfileController::class, 'showPaymentPlanForm'])->name('profile.payment-plan');



//Auth::routes();
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/dashboard', function () {
   // Only authenticated users can access this route
})->middleware('auth');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


Route::group(['middleware' => ['auth', 'role:admin']], function () {
    // Routes for admin
});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    // Routes for regular users
});


// web.php
Route::get('/ajax-data', [PageController::class, 'getAjaxData']);



Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/resend', [VerificationController::class, 'resend'])
    ->middleware(['auth', 'throttle:6,1'])->name('verification.send');

    Route::post('/v1/mpesatest/stk/push', [MpesaSTKPUSHController::class, 'STKPush']); 

    // routes/web.php
Route::get('/mpesa/transaction/{transactionId}', [MpesaSTKPUSHController::class, 'showTransaction']);

// Mpesa STK Push Callback Route 
Route::post('v1/confirm', [MpesaSTKPUSHController::class, 'STKConfirm'])
    ->name('mpesa.confirm');

    Route::get('/mpesa/stkquery/{checkoutRequestId}', [MpesaController::class, 'queryStkPush']);

    // For web routes
Route::get('/mpesa/transaction', function () {
    return view('mpesa.transaction');
});

Route::get('/mpesa', function () {
    return view('mpesa.index');
});

// routes/web.php
Route::get('/mpesa/paymentform', [PaymentController::class, 'showPaymentForm']);
Route::post('/mpesa/payment', [PaymentController::class, 'initiatePaymentPlan']);
Route::post('/mpesa/callback', [PaymentController::class, 'handleCallback']);
Route::get('/mpesa/payment-response', [PaymentController::class, 'handlePaymentresponse']);




