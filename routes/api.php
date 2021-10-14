<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
  Route::post('login', [AuthController::class, 'verifyToken']);
  Route::get('refresh', [AuthController::class, 'refresh']);

  Route::middleware('auth:api')->group(function () {
    Route::get('user', [AuthController::class, 'user']);
    Route::post('update', [AuthController::class, 'update']);
    Route::post('logout', [AuthController::class, 'logout']);
  });
});

Route::middleware('auth:api')->group(function () {
  Route::resource('categories', ProductCategoryController::class);

  Route::resource('accounts', AccountController::class);

  Route::resource('customers', CustomerController::class);

  Route::resource('products', ProductController::class);

  Route::resource('suppliers', SupplierController::class);

  Route::resource('invoices', InvoiceController::class);

  Route::resource('options', OptionController::class);
});
Route::resource('companies', CompanyController::class);
