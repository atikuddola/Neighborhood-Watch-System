<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\ThirdPartyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'homepage']);
Route::get('/e10Rt45', [HomeController::class, 'dashboard']);
Route::get('/rE2drd3', [ProfileController::class, 'userdashboard']);
Route::get('/form', [HomeController::class, 'form']);
Route::post('/home_message', [FormController::class, 'store']);
Route::post('/post_req', [FeedController::class, 'store']);
Route::get('/auth/google', [ThirdPartyController::class, 'redirect'])->name('google-auth');
Route::get('/auth/google/call-back', [ThirdPartyController::class, 'callbackGoogle']);




Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
