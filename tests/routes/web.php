<?php

use App\Http\Controllers\backend\AdminAuthController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\DoctorController;
use App\Http\Controllers\backend\InvoiceBillingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/', [AdminAuthController::class, 'index']);

Auth::routes();
Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard']);

// Invoice Routes
Route::get('/admin/invoice', [InvoiceBillingController::class, 'invoiceBilling']);
Route::get('/admin/create-invoice', [InvoiceBillingController::class, 'invoiceCreate']);
Route::post('/admin/create-invoice/store', [InvoiceBillingController::class, 'invoiceStore']);
Route::get('/admin/invoice-view/{id}', [InvoiceBillingController::class, 'invoiceView']);
Route::get('/admin/invoice-edit/{id}', [InvoiceBillingController::class, 'invoiceEdit']);
Route::post('/admin/invoice-update/{id}', [InvoiceBillingController::class, 'invoiceUpdate']);
Route::get('/admin/invoice-delete/{id}', [InvoiceBillingController::class, 'invoiceDelete']);
Route::get('/admin/invoice-print/{id}', [InvoiceBillingController::class, 'invoicePrint']);

//Doctor........
Route::get('/admin/doctor', [DoctorController::class, 'doctor']);
Route::get('/admin/doctor-add', [DoctorController::class, 'doctorAdd']);
Route::post('/admin/doctor-add/store', [DoctorController::class, 'doctorStore']);
Route::get('/admin/doctor-view/{id}', [DoctorController::class, 'doctorView']);
Route::get('/admin/doctor-edit/{id}', [DoctorController::class, 'doctorEdit']);
Route::post('/admin/doctor-update/{id}', [DoctorController::class, 'doctorUpdate']);
Route::get('/admin/doctor-delete/{id}', [DoctorController::class, 'doctorDelete']);
