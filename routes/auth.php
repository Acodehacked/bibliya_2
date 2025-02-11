<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\QuestionBankController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\QuestionCategoryController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('guest')->group(function () {
    // Route::get('register', [RegisteredUserController::class, 'create'])
    //     ->name('register');

    // Route::post('register', [RegisteredUserController::class, 'store']);
    Route::permanentRedirect('/admin','/admin/login');
    Route::get('admin/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('admin/login', [AuthenticatedSessionController::class, 'store']);

    // Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    //     ->name('password.request');

    // Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    //     ->name('password.email');

    // Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    //     ->name('password.reset');

    // Route::post('reset-password', [NewPasswordController::class, 'store'])
    //     ->name('password.store');
});

Route::middleware('auth')->group(function () {
    // Route::permanentRedirect('/admin/login','/dashboard');
    Route::get('/dashboard', function () {
        return Inertia::render('Admin/dashboard/Dashboard');
    })->name('admin.dashboard');

    Route::get('/QuestionBank/{language}', [QuestionBankController::class, 'index']);
    Route::get('/Books/{language}', [BookController::class, 'index']);
    Route::post('/Books/{language}', [BookController::class, 'table']);
    Route::post('/Books/{language}/ActivateAll', [BookController::class, 'activateAll']);
    Route::post('/Books/{language}/DeleteAll', [BookController::class, 'deleteAll']);


    Route::get('/categories', [QuestionCategoryController::class, 'index']);
    Route::post('/categories', [QuestionCategoryController::class, 'store']);
    Route::get('/categories/{id}', [QuestionCategoryController::class, 'show']);
    Route::put('/categories/{id}', [QuestionCategoryController::class, 'update']);
    Route::delete('/categories/{id}', [QuestionCategoryController::class, 'destroy']);
    // Route::get('verify-email', EmailVerificationPromptController::class)
    //     ->name('verification.notice');

    // Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
    //     ->middleware(['signed', 'throttle:6,1'])
    //     ->name('verification.verify');

    // Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    //     ->middleware('throttle:6,1')
    //     ->name('verification.send');

    // Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
    //     ->name('password.confirm');

    // Route::post('admin/confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Route::put('admin/password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('admin/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
