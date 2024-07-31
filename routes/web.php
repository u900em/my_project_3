<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\EditUserController;
use App\Http\Controllers\User\EditPhotoController;
use App\Http\Controllers\User\DeleteUserController;
use App\Http\Controllers\User\EditStatusController;
use App\Http\Controllers\Admin\CreateUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\User\EditCredentialsController;
use App\Http\Controllers\Auth\PasswordConfirmationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'view_create'])->name('register');

    Route::post('register', [RegisterController::class, 'create']);

    Route::get('/login', [LoginController::class, 'view_login'])->name('login');

    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/forgot_password', [ForgotPasswordController::class, 'view_forgot_password'])
        ->name('forgot_password');

    Route::post('/forgot_password', [ForgotPasswordController::class, 'forgot_password']);

    Route::get('/reset_password', [ResetPasswordController::class, 'view_reset_password'])
        ->name('password.reset');

    Route::post('/reset_password', [ResetPasswordController::class, 'reset_password'])
        ->name('update.password');

    Route::get('/not_verify', [RegisterController::class, 'user_is_not_verify']);
});

Route::middleware('auth')->group(function () {
    Route::get('/page_profile', [UserController::class, 'main_page'])
        ->name('page.profile');

    Route::get('/users', [UserController::class, 'show'])
    ->middleware('verified')
    ->name('users');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/email_verify', [EmailVerificationPromptController::class, '__invoke'])
        ->name('verification.notice');

    Route::post('/email_verify_notifice', [EmailVerificationNotificationController::class, '__invoke'])
        ->name('verification.send');

    Route::get('/email_verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware('signed')
        ->name('verification.verify');

    Route::get('/confirm_password', [PasswordConfirmationController::class, 'show'])
        ->name('password.confirm');

    Route::post('/confirm_password', [PasswordConfirmationController::class, 'store']);

    Route::get('/edit_general_info.{id}', [EditUserController::class, 'show'])
        ->name('show.edit.general.info');

    Route::post('/edit_general_info.{id}', [EditUserController::class, 'edit_information'])
        ->name('edit.general.info');

    Route::get('/edit_credentials.{id}', [EditCredentialsController::class, 'show'])
        ->middleware(['verified', 'password.confirm'])
        ->name('security');

    Route::post('/edit_credentials.{id}', [EditCredentialsController::class, 'edit_security'])
        ->name('edit.security');

    Route::get('/status.{id}', [EditStatusController::class, 'show'])
        ->name('show.edit.status');

    Route::post('/status.{id}', [EditStatusController::class, 'editStatus'])
        ->name('edit.status');

    Route::get('/media.{id}', [EditPhotoController::class, 'show'])
        ->name('show.edit.media');

    Route::post('/media.{id}', [EditPhotoController::class, 'editImage'])
        ->name('edit.image');

    Route::get('/delete.image.{id}', [EditPhotoController::class, 'deleteImage'])
        ->name('delete.image');

    Route::get('/deleteUser.{id}', [DeleteUserController::class, 'deleteUser'])
        ->name('delete.user');
});

Route::middleware('admin')->group(function () {
    Route::get('/create_user', [CreateUserController::class, 'show']);

    Route::post('/create_user', [CreateUserController::class, 'create'])
        ->name('create.user');
});