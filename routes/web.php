<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
Route::get('/change-password', [HomeController::class, 'changePasswordForm'])->name('profile.changePasswordForm');
Route::post('/change-password', [HomeController::class, 'changePassword'])->name('profile.changePassword');

Route::prefix('link')->middleware(['auth'])->group(function () {
    Route::get('/all', [UrlController::class, 'index'])->name('url.index');
    Route::get('/create', [UrlController::class, 'create'])->name('url.create');
    Route::post('/store', [UrlController::class, 'store'])->name('url.store');
    Route::get('/edit/{url}', [UrlController::class, 'edit'])->name('url.edit');
    Route::put('/update/{url}', [UrlController::class, 'update'])->name('url.update');
    Route::get('/destroy/{url}', [UrlController::class, 'destroy'])->name('url.destroy');
});

Route::get('/link/{link}', [UrlController::class, 'link'])->name('url.link');
Route::get('/qr/{url}', [UrlController::class, 'qrcode'])->name('url.qrcode');
