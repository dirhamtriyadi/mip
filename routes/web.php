<?php

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

Route::get('/notallowed', function () {
    return view('pages.notallowed');
})->name('notallowed');

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

// Login routes
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login.login');
Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('login.logout');

// User routes
Route::middleware(['auth', 'admin.auth'])->group(function () {
    Route::get('/users', [\App\Http\Controllers\UsersController::class, 'index'])->name('users');
    Route::post('/users', [\App\Http\Controllers\UsersController::class, 'store'])->name('users.store');
    Route::post('/users/updatepassword', [\App\Http\Controllers\UsersController::class, 'updatePassword'])->name('users.updatepassword');
    Route::get('/users/{id}/edit', [\App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit');
    Route::delete('/users/{id}/delete', [\App\Http\Controllers\UsersController::class, 'destroy'])->name('users.delete');
});
