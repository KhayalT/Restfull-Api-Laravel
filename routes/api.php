<?php

use App\Http\Controllers\Buyer\BuyerController;
use App\Http\Controllers\Buyer\BuyerTransactionController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Transaction\TransactionCategoryController;
use App\Http\Controllers\Transaction\TransactionController;
use App\Http\Controllers\Transaction\TransactionSellerController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('buyer', BuyerController::class);

Route::apiResource('buyer.transaction', BuyerTransactionController::class);

Route::apiResource('seller', SellerController::class);

Route::apiResource('product', ProductController::class);

Route::apiResource('transaction', TransactionController::class);

Route::apiResource('transaction.category', TransactionCategoryController::class);

Route::apiResource('transaction.seller', TransactionSellerController::class);

Route::apiResource('category', CategoryController::class);

Route::apiResource('user', UserController::class);
