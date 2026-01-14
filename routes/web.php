<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TopUpController;
use App\Http\Controllers\TopUpWebhookController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DnAccountTestController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/top-up', [TopUpController::class, 'index'])->name('topup.index');
Route::get('/download', [DownloadController::class, 'index'])->name('download.index');
Route::get('/api/download/count', [DownloadController::class, 'getCount'])->name('download.count');
Route::post('/api/download/increment', [DownloadController::class, 'incrementCount'])->name('download.increment');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/check-username', [AuthController::class, 'checkUsername'])->name('check.username');
Route::post('/check-email', [AuthController::class, 'checkEmail'])->name('check.email');
Route::post('/check-username-topup', [TopUpController::class, 'checkUsernameForTopup'])->name('check.username.topup');
Route::post('/top-up/create-snap', [TopUpController::class, 'createSnapPayment'])->name('topup.create-snap');
Route::get('/top-up/packages', [TopUpController::class, 'getPackages'])->name('topup.packages');
Route::get('/api/leaderboard', [HomeController::class, 'getLeaderboard'])->name('leaderboard.api');
Route::post('/donation/create-snap', [HomeController::class, 'createDonationSnap'])->name('donation.create-snap');
Route::post('/top-up/validate-coupon', [TopUpController::class, 'validateCoupon'])->name('topup.validate-coupon');
Route::post('/top-up/validate-affiliator', [TopUpController::class, 'validateAffiliator'])->name('topup.validate-affiliator');
Route::get('/top-up/history', [TopUpController::class, 'getHistory'])->name('topup.history');
Route::post('/top-up/cancel', [TopUpController::class, 'cancelTransaction'])->name('topup.cancel');
Route::post('/top-up/pay-pending', [TopUpController::class, 'payPendingTransaction'])->name('topup.pay-pending');

// Webhook route - excluded from CSRF verification
Route::post('/api/payment/webhook', [TopUpWebhookController::class, 'handle'])->name('topup.webhook');

// Profile Routes (Protected)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile.index');
    Route::post('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
});

// Test Routes
Route::get('/test/dn-account', [DnAccountTestController::class, 'index'])->name('test.dn-account');
