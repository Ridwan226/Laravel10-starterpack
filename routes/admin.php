<?php

use App\Http\Controllers\admin\DashboardController;
use Illuminate\Support\Facades\Route;


Route::prefix('administrator')->group(function () {
  Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'viewDashboard']);
  });
});
