<?php

use App\Http\Controllers\Purchases\PurchasePostController;
use Illuminate\Support\Facades\Auth;
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

//todo: Auth
Route::middleware([
    'guest:admin,web',
    "prevent-back-history"
])->group(function () {
    Auth::routes();
    Route::get('/admin-login', [\App\Http\Controllers\AuthAdmin\LoginAdminController::class, 'showLoginForm'])->name('admin.login.get');
    Route::post('/admin-login', [\App\Http\Controllers\AuthAdmin\LoginAdminController::class, 'login'])->name('admin.login.post');
});

Route::middleware([
    'auth:admin'
])->post('/admin-logout', [\App\Http\Controllers\AuthAdmin\LoginAdminController::class, 'logout'])->name('admin.logout.post');

Route::middleware([
    'auth:web'
])->post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::middleware([
    'auth:admin',
    "prevent-back-history"
])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeAdminController::class, 'index'])->name('home');
});

Route::middleware([
    'auth:web',
    "prevent-back-history"
])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::post('/purchase', PurchasePostController::class);
});
