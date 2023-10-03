<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('administrator')->group(function () {
  Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'viewDashboard']);
    //Users
    Route::get('/user', [UserController::class, 'viewUser']);
    Route::post('/user/add', [UserController::class, 'addUser']);
    Route::post('/user/edit', [UserController::class, 'editUser']);
    Route::post('/user/update', [UserController::class, 'updateUser']);
    Route::post('/user/del', [UserController::class, 'delUser']);
    // Route::get('/users/detail/{id}', [UserController::class, 'detailUser']);
    // Route::post('users/assignpermission', [UserController::class, 'assignPermission']);
  });
});
