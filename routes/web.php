<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WasabiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UploaderController;
use App\Http\Controllers\MediaLibraryController;
use App\Http\Controllers\SuperadminController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', [RegisterController::class, 'index']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/user/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verification-notification', function () {
    Auth::user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth', 'verified', 'user'])->group(function () {
    Route::get('/user/home/kirimlamaran', [UserController::class, 'kirim']);
    Route::get('/user/home', [UserController::class, 'home']);
    Route::post('/user/home/upload', [UserController::class, 'upload']);
    Route::get('/user/home/editprofile', [UserController::class, 'editProfile']);
    Route::post('/user/home/editprofile', [UserController::class, 'updateProfile']);
    Route::get('/user/home/essay', [UserController::class, 'essay']);
    Route::post('/user/home/essay', [UserController::class, 'updateEssay']);
});

Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::get('/admin/detailpendaftar/{id}', [SuperadminController::class, 'detailPendaftar']);
    Route::get('/admin/berkaspendaftar/{id}', [SuperadminController::class, 'berkasPendaftar']);
    Route::post('/admin/validasi', [SuperadminController::class, 'validasi']);
    Route::get('/admin/streampdf/{id}', [SuperadminController::class, 'streamPDF']);
    Route::get('/admin/ktp/{id}', [SuperadminController::class, 'streamKTP']);
    Route::get('/admin/ijazah/{id}', [SuperadminController::class, 'streamIJAZAH']);
    Route::get('/admin/sertifikat/{id}', [SuperadminController::class, 'streamSERTIFIKAT']);
    Route::get('/admin/bidang', [SuperadminController::class, 'bidang']);
    Route::get('/admin/bidang/add', [SuperadminController::class, 'add_bidang']);
    Route::post('/admin/bidang/add', [SuperadminController::class, 'store_bidang']);
    Route::get('/admin/bidang/edit/{id}', [SuperadminController::class, 'edit_bidang']);
    Route::post('/admin/bidang/edit/{id}', [SuperadminController::class, 'update_bidang']);
    Route::get('/admin/bidang/delete/{id}', [SuperadminController::class, 'delete_bidang']);
    Route::get('/admin/bidang', [SuperadminController::class, 'bidang']);
    Route::get('/admin/home', [SuperadminController::class, 'home']);
    Route::post('/admin/pendaftar/{id}', [SuperadminController::class, 'detailPendaftar']);
});
Route::get('oauth/google', [LoginController::class, 'redirectToProvider'])->name('oauth.google');
Route::get('oauth/google/callback', [LoginController::class, 'handleProviderCallback'])->name('oauth.google.callback');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});
