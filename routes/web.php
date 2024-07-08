<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplyController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

Auth::routes();

Route::name('login') ->get('/login',   [HomeController::class, 'login']);
Route::name('logout') ->get('/logout', [HomeController::class, 'logout']);

Route::middleware(['web', 'auth'])->group(function () {
    Route::name('home')->get('/', [HomeController::class, 'index']);

    Route::prefix('users')->name('users.')->group(function () {
        Route::name('index')  ->get('/',              [UserController::class, 'index']);
        Route::name('create') ->get('create',         [UserController::class, 'create']);
        Route::name('store')  ->post('/',             [UserController::class, 'store']);
        Route::name('edit')   ->get('{user}/edit',    [UserController::class, 'edit']);
        Route::name('update') ->put('{user}',         [UserController::class, 'update']);
        Route::name('destroy')->delete('{user}',      [UserController::class, 'destroy']);
        Route::name('restore')->put('{user}/restore', [UserController::class, 'restore']);

    });

    Route::prefix('orders')->name('orders.')->group(function () {
        Route::name('index')  ->get('/',            [OrderController::class, 'index']);
        Route::name('create') ->get('create',       [OrderController::class, 'create']);
        Route::name('store')  ->post('/',           [OrderController::class, 'store']);
        Route::name('show')   ->get('{order}',      [OrderController::class, 'show']);
        Route::name('edit')   ->get('{order}/edit', [OrderController::class, 'edit']);
        Route::name('update') ->put('{order}',      [OrderController::class, 'update']);
        Route::name('destroy')->delete('{order}',   [OrderController::class, 'destroy']);
    });

    Route::prefix('products')->name('products.')->group(function () {
        Route::name('index')  ->get('/',              [ProductController::class, 'index']);
        Route::name('create') ->get('create',         [ProductController::class, 'create']);
        Route::name('store')  ->post('/',             [ProductController::class, 'store']);
        Route::name('show')   ->get('{product}',      [ProductController::class, 'show']);
        Route::name('edit')   ->get('{product}/edit', [ProductController::class, 'edit']);
        Route::name('update') ->put('{product}',      [ProductController::class, 'update']);
        Route::name('destroy')->delete('{product}',   [ProductController::class, 'destroy']);
    });

    Route::prefix('supplies')->name('supplies.')->group(function () {
        Route::name('index')  ->get('/',             [SupplyController::class, 'index']);
        Route::name('create') ->get('create',        [SupplyController::class, 'create']);
        Route::name('store')  ->post('/',            [SupplyController::class, 'store']);
        Route::name('show')   ->get('{supply}',      [SupplyController::class, 'show']);
        Route::name('edit')   ->get('{supply}/edit', [SupplyController::class, 'edit']);
        Route::name('update') ->put('{supply}',      [SupplyController::class, 'update']);
        Route::name('destroy')->delete('{supply}',   [SupplyController::class, 'destroy']);
    });

    Route::prefix('suppliers')->name('suppliers.')->group(function () {
        Route::name('index')  ->get('/',               [SupplierController::class, 'index']);
        Route::name('create') ->get('create',          [SupplierController::class, 'create']);
        Route::name('store')  ->post('/',              [SupplierController::class, 'store']);
        Route::name('show')   ->get('{supplier}',      [SupplierController::class, 'show']);
        Route::name('edit')   ->get('{supplier}/edit', [SupplierController::class, 'edit']);
        Route::name('update') ->put('{supplier}',      [SupplierController::class, 'update']);
        Route::name('destroy')->delete('{supplier}',   [SupplierController::class, 'destroy']);
    });
});
