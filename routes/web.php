<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\AdminsController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Auth\ForgetPasswordController;

Auth::routes();

Route::get('/', [HomeController::class, 'redirectAdmin'])->name('index');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('roles', RolesController::class, ['names' => 'admin.roles']);
    Route::resource('users', UsersController::class, ['names' => 'admin.users']);
    Route::resource('admins', AdminsController::class, ['names' => 'admin.admins']);

    // Login Routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login/submit', [LoginController::class, 'login'])->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit', [LoginController::class, 'logout'])->name('admin.logout.submit');

    // Forget Password Routes
    Route::get('/password/reset', [ForgetPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('/password/reset/submit', [ForgetPasswordController::class, 'reset'])->name('admin.password.update');
});
