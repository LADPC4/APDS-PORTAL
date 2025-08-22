<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    // Route::get('register', [RegisteredUserController::class, 'create'])
    //     ->name('register');
    
    //new register route
    Route::get('register', [RegisteredUserController::class, 'showChoice'])
        ->name('register');

    //regular registration 
    Route::get('register/new', [RegisteredUserController::class, 'create'])
        ->name('register.new');

    //old store
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::post('register/new', [RegisteredUserController::class, 'store'])
        ->name('register.new.store');

    // Existing PLI registration path
    Route::get('register/existing', [\App\Http\Controllers\Auth\ExistingPliRegistrationController::class, 'showLoanCodeForm'])
        ->name('register.existing');

    Route::post('register/existing/validate', [\App\Http\Controllers\Auth\ExistingPliRegistrationController::class, 'validateLoanCode'])
        ->name('register.existing.validate');

    Route::get('register/existing/confirm', [\App\Http\Controllers\Auth\ExistingPliRegistrationController::class, 'showConfirmation'])
        ->name('register.existing.confirm');

    // NEW: Email verification routes
    Route::post('register/existing/send-verification', [\App\Http\Controllers\Auth\ExistingPliRegistrationController::class, 'sendVerificationEmail'])
        ->name('register.existing.send-verification');

    Route::get('register/existing/verification-sent', [\App\Http\Controllers\Auth\ExistingPliRegistrationController::class, 'showVerificationSent'])
        ->name('register.existing.verification-sent');

    Route::get('register/existing/verify/{token}', [\App\Http\Controllers\Auth\ExistingPliRegistrationController::class, 'verifyEmail'])
        ->name('register.existing.verify');

    Route::get('register/existing/verification-success', [\App\Http\Controllers\Auth\ExistingPliRegistrationController::class, 'showVerificationSuccess'])
        ->name('register.existing.verification-success');

    Route::get('register/existing/verification-failed', [\App\Http\Controllers\Auth\ExistingPliRegistrationController::class, 'showVerificationFailed'])
        ->name('register.existing.verification-failed');

    Route::get('register/existing/complete', [\App\Http\Controllers\Auth\ExistingPliRegistrationController::class, 'showFinalForm'])
        ->name('register.existing.complete');

    Route::post('register/existing/complete', [\App\Http\Controllers\Auth\ExistingPliRegistrationController::class, 'storeFinalRegistration'])
        ->name('register.existing.store');

    Route::get('register/canceled', [\App\Http\Controllers\Auth\ExistingPliRegistrationController::class, 'showCanceled'])
        ->name('register.canceled');

    // unchanged

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
