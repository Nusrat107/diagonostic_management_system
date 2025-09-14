<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\backendController;
use App\Http\Controllers\backend\InvoiceBillingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [backendController::class, 'index']);
Auth::routes();

Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard']);
Route::get('/admin/invoice', [InvoiceBillingController::class, 'invoiceBilling']);
