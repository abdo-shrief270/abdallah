<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GovController;
use App\Http\Controllers\RoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class,'loginPage'])->name('loginPage');
Route::get('/change', [AuthController::class,'changePasswordPage'])->name('changePasswordPage');
Route::post('/changePassword', [AuthController::class,'changePassword'])->name('changePassword');
Route::post('/login', [AuthController::class,'login'])->name('login');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');
//Route::get('/', [CityController::class,'index'])->name('home');

Route::get('/home', [OrderController::class, 'index'])->name('home')->middleware('auth.role:owner');

Route::middleware('auth.role:owner')->group(function () {

    Route::prefix('customers')->name('customers.')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('index');
        Route::get('/create', [CustomerController::class, 'create'])->name('create');
        Route::post('/store', [CustomerController::class, 'store'])->name('store');
        Route::get('/delete/{customer}', [CustomerController::class, 'delete'])->name('delete');
        Route::get('/edit/{customer}', [CustomerController::class, 'edit'])->name('edit');
        Route::post('/update/{customer}', [CustomerController::class, 'update'])->name('update');
    });

    Route::prefix('routs')->name('routs.')->group(function () {
        Route::get('/', [RoutController::class, 'index'])->name('index');
        Route::get('/create', [RoutController::class, 'create'])->name('create');
        Route::post('/store', [RoutController::class, 'store'])->name('store');
        Route::get('/delete/{rout}', [RoutController::class, 'delete'])->name('delete');
        Route::get('/edit/{rout}', [RoutController::class, 'edit'])->name('edit');
        Route::post('/update/{rout}', [RoutController::class, 'update'])->name('update');
        Route::get('/exportRoutOrders/{rout}', [RoutController::class, 'exportRoutOrders'])->name('exportRoutOrders');
        Route::get('/export', [RoutController::class, 'export'])->name('export');
    });

    Route::prefix('govs')->name('govs.')->group(function () {
        Route::get('/', [GovController::class, 'index'])->name('index');
        Route::get('/create', [GovController::class, 'create'])->name('create');
        Route::post('/store', [GovController::class, 'store'])->name('store');
        Route::get('/delete/{gov}', [GovController::class, 'delete'])->name('delete');
        Route::get('/edit/{gov}', [GovController::class, 'edit'])->name('edit');
        Route::post('/update/{gov}', [GovController::class, 'update'])->name('update');
        Route::get('/export', [GovController::class, 'export'])->name('export');

    });


    Route::prefix('cities')->name('cities.')->group(function () {
        Route::get('/', [CityController::class, 'index'])->name('index');
        Route::get('/create', [CityController::class, 'create'])->name('create');
        Route::post('/store', [CityController::class, 'store'])->name('store');
        Route::get('/delete/{city}', [CityController::class, 'delete'])->name('delete');
        Route::get('/edit/{city}', [CityController::class, 'edit'])->name('edit');
        Route::post('/update/{city}', [CityController::class, 'update'])->name('update');
        Route::get('/export', [CityController::class, 'export'])->name('export');

    });

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/delete/{user}', [UserController::class, 'delete'])->name('delete');
        Route::get('/activate/{user}', [UserController::class, 'activate'])->name('activate');
        Route::get('/deactivate/{user}', [UserController::class, 'deactivate'])->name('deactivate');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::post('/update/{user}', [UserController::class, 'update'])->name('update');
        Route::get('/export', [UserController::class, 'export'])->name('export');

    });

    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/delete/{product}', [ProductController::class, 'delete'])->name('delete');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
        Route::post('/update/{product}', [ProductController::class, 'update'])->name('update');
        Route::get('/export', [ProductController::class, 'export'])->name('export');
    });



    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/create', [OrderController::class, 'create'])->name('create');
        Route::post('/store', [OrderController::class, 'store'])->name('store');
        Route::get('/delete/{order}', [OrderController::class, 'delete'])->name('delete');
        Route::get('/edit/{order}', [OrderController::class, 'edit'])->name('edit');
        Route::post('/update/{order}', [OrderController::class, 'update'])->name('update');
        Route::get('/importPage', [OrderController::class, 'importPage'])->name('importPage');
        Route::post('/import', [OrderController::class, 'import'])->name('import');
        Route::get('/export', [OrderController::class, 'export'])->name('export');
        Route::get('/exportNew', [OrderController::class, 'exportNew'])->name('exportNew');
        Route::get('/exportUnFinished', [OrderController::class, 'exportUnFinished'])->name('exportUnFinished');
        Route::get('/exportFinished', [OrderController::class, 'exportFinished'])->name('exportFinished');
        Route::get('/exportCanceled', [OrderController::class, 'exportCanceled'])->name('exportCanceled');
    });

});

Route::get('/', [OrderController::class, 'index'])->name('home_user')->middleware('auth.role:user');
Route::prefix('orders')->name('orders.')->group(function () {
    Route::get('/arrive/{order}', [OrderController::class, 'arrive'])->name('arrive');
    Route::get('/finish/{order}', [OrderController::class, 'finish'])->name('finish');
    Route::get('/cancel/{order}', [OrderController::class, 'cancel'])->name('cancel');
})->middleware('auth.role:user');
















//
//
//
//Route::prefix('owners')->name('owners.')->group(function () {
//    Route::get('/', [UserController::class, 'index'])->name('index');
//    Route::get('/create', [UserController::class, 'create'])->name('create');
//    Route::post('/store', [UserController::class, 'store'])->name('store');
//    Route::delete('/delete', [UserController::class, 'delete'])->name('delete');
//    Route::get('/edit/{owner}', [UserController::class, 'edit'])->name('edit');
//    Route::put('/update/{owner}', [UserController::class, 'update'])->name('update');
//});
