<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'index_login')->name('login.index');
    Route::post('/login/store', 'login_store')->name('login.store');
});

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::post('/logout', 'logout')->name('logout');
    });

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index_dashboard')->name('dashboard.index');
    });

    Route::controller(UserController::class)->group(function () {
       Route::get('/dashboard/user/admin', 'index_admin')->name('user.admin.index');
       Route::get('/dashboard/user/admin/data', 'data_admin')->name('user.admin.data');
       Route::get('/dashboard/user', 'index_user')->name('user.index');
       Route::get('/dashboard/user/data', 'data_user')->name('user.data');
       Route::post('/dashboard/user/admin/store', 'store_admin')->name('user.store.admin');
       Route::get('/dashboard/user/{user}/edit/data', 'edit_data')->name('user.edit.data');
       Route::patch('/dashboard/user/{user}/edit/data', 'update_data')->name('user.update.data');
       Route::get('/dashboard/user/{user}/edit/password', 'edit_password')->name('user.edit.password');
       Route::patch('/dashboard/user/{user}/edit/password', 'update_password')->name('user.update.password');
       Route::delete('/dashboard/user/{user}/delete', 'delete')->name('user.delete');
    });

    Route::controller(TravelController::class)->group(function () {
        Route::get('/dashboard/travel', 'index_travel')->name('travel.index');
        Route::get('/dashboard/travel/data', 'data_travel')->name('travel.data');
        Route::post('/dashboard/trave/store', 'store_travel')->name('travel.store');
        Route::get('/dashboard/travel/{travel}/edit', 'edit_travel')->name('travel.edit');
        Route::patch('/dashboard/travel/{travel}/edit', 'update_travel')->name('travel.update');
        Route::delete('/dashboard/travel/{travel}/delete', 'delete_travel')->name('travel.delete');
    });
});
