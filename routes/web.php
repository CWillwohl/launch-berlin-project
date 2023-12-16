<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Any\DashboardController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\Auth\RegisterScreenController;
use App\Http\Controllers\Lock\Views\IndexLockController;
use App\Http\Controllers\User\Views\IndexUserController;
use App\Http\Controllers\Auth\AuthenticateUserController;
use App\Http\Controllers\Lock\Views\CreateLockController;
use App\Http\Controllers\Lock\Views\UpdateLockController;
use App\Http\Controllers\User\Views\UpdateUserController;
use App\Http\Controllers\Auth\AuthenticateScreenController;
use App\Http\Controllers\Lock\CRUD\LinkUserInLockController;
use App\Http\Controllers\Lock\CRUD\UpdateStatusLockController;
use App\Http\Controllers\Lock\CRUD\ReceiveLockStatusController;
use App\Http\Controllers\Location\Views\IndexLocationController;
use App\Http\Controllers\Location\Views\CreateLocationController;
use App\Http\Controllers\Location\Views\UpdateLocationController;
use App\Http\Controllers\Lock\CRUD\CreateLockController as CreateFunctionLockController;
use App\Http\Controllers\Lock\CRUD\DeleteLockController as DeleteFunctionLockController;
use App\Http\Controllers\Lock\CRUD\UpdateLockController as UpdateFunctionLockController;
use App\Http\Controllers\User\CRUD\DeleteUserController as DeleteFunctionUserController;
use App\Http\Controllers\User\CRUD\UpdateUserController as UpdateFunctionUserController;
use App\Http\Controllers\Location\CRUD\CreateLocationController as CreateFunctionLocationController;
use App\Http\Controllers\Location\CRUD\DeleteLocationController as DeleteFunctionLocationController;
use App\Http\Controllers\Location\CRUD\UpdateLocationController as UpdateFunctionLocationController;

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
    return redirect()->route('login-form');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', RegisterScreenController::class)->name('register-form');
    Route::post('/register', RegisterUserController::class)->name('register-user');

    Route::get('/login', AuthenticateScreenController::class)->name('login-form');
    Route::post('/login', AuthenticateUserController::class)->name('login-user');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::post('/logout', LogoutController::class)->name('logout');

    Route::prefix('fechaduras')->group(function () {
        Route::middleware('admin')->group(function () {
            Route::get('/', IndexLockController::class)->name('locks.index');
            Route::get('/cadastrar', CreateLockController::class)->name('locks.create');
            Route::post('/store', CreateFunctionLockController::class)->name('locks.store');
            Route::get('/editar/{lock}', UpdateLockController::class)->name('locks.edit');
            Route::put('/editar/{lock}', UpdateFunctionLockController::class)->name('locks.update');
            Route::delete('/deletar/{lock}', DeleteFunctionLockController::class)->name('locks.destroy');
            Route::patch('/vincular/{lock}', LinkUserInLockController::class)->name('locks.link');
        });

        Route::patch('/atualizar-status/{lock}', UpdateStatusLockController::class)->name('locks.update-status');
        Route::get('/status/{lock_hash}', ReceiveLockStatusController::class)->name('locks.receive-status');
    });

    Route::middleware('admin')->group(function () {
        Route::prefix('usuarios')->group(function () {
            Route::get('/', IndexUserController::class)->name('users.index');
            Route::get('/editar/{user}', UpdateUserController::class)->name('users.edit');
            Route::put('/editar/{user_id}', UpdateFunctionUserController::class)->name('users.update');
            Route::delete('/deletar/{user}', DeleteFunctionUserController::class)->name('users.destroy');
        });
    });
});


