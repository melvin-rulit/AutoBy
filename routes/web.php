<?php

use App\Http\Controllers\BranchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/user', [UserController::class, 'current']);
    Route::get('/roles', [UserController::class, 'getRoles']);

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index'])->name('users.list');
        Route::post('/', [UserController::class, 'store']);

    });

    Route::group(['prefix' => 'branches'], function () {
        Route::get('/', [BranchController::class, 'index'])->name('branches.list');
        Route::post('/', [BranchController::class, 'store']);
        Route::delete('/{id}', [BranchController::class, 'delete']);
    });

    Route::get('/', [IndexController::class, 'index'])->name('dashboard');
});

Auth::routes();
