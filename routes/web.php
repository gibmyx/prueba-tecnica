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
    Route::get('/dashboard', [App\Http\Controllers\HomeAdminController::class, 'index'])->name('dashboard');
    Route::get('/products', [App\Http\Controllers\ProductsController::class, 'index'])->name('products.list');
    Route::get('/product/edit/{id}', [App\Http\Controllers\ProductsController::class, 'showProduct'])->name('products.edit');
    Route::get('/product/create', [App\Http\Controllers\ProductsController::class, 'createProduct'])->name('products.create');

    Route::post('/product/update', [App\Http\Controllers\ProductsController::class, 'update'])->name('products.update');
    Route::post('/product/save', [App\Http\Controllers\ProductsController::class, 'save'])->name('products.save');
});

Route::middleware([
    'auth:web',
    "prevent-back-history"
])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/purchase', PurchasePostController::class);
});
