<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->middleware('auth:admins')->group(function(){
    Route::get('/index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/accessDenied', function () {
        return view('admin.dontHaveAccess');
    })->name('admin.dontHaveAccess');
    Route::get('logout', function (){
        Auth::logout();
        abort(404);
    })->name('admin.logout');
    Route::resource('brand', \App\Http\Controllers\Admin\BrandController::class);
    Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('product', \App\Http\Controllers\Admin\ProductController::class);
    Route::resource('admin', \App\Http\Controllers\Admin\AdminController::class);
    Route::get('/category/changeStatus/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'changeStatus'])->name('category.changeStatus');
    Route::get('/category/restoreCategory/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'restoreCategory'])->name('category.restoreCategory');
    Route::post('/category/restoreCategories', [\App\Http\Controllers\Admin\CategoryController::class, 'restoreCategories'])->name('category.restoreCategories');
    Route::get('/product/changeStatus/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'changeStatus'])->name('product.changeStatus');
    Route::get('/brand/changeStatus/{id}', [\App\Http\Controllers\Admin\BrandController::class, 'changeStatus'])->name('brand.changeStatus');
    Route::get('/product/restoreProduct/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'restoreProduct'])->name('product.restoreProduct');
    Route::post('/product/restoreAllProducts/', [\App\Http\Controllers\Admin\ProductController::class, 'restoreAllProducts'])->name('product.restoreAllProducts');
    Route::get('/product/imageProduct/{id}', [\App\Http\Controllers\Admin\ImageController::class, 'imageProduct'])->name('product.imageProduct');
    Route::post('/product/insertImageProduct', [\App\Http\Controllers\Admin\ImageController::class, 'insertImageProduct'])->name('product.insertImageProduct');
    Route::delete('/product/deleteImageProduct/{id}', [\App\Http\Controllers\Admin\ImageController::class, 'deleteImageProduct'])->name('product.deleteImageProduct');
    Route::delete('/product/deleteAllImagesProduct/{id}', [\App\Http\Controllers\Admin\ImageController::class, 'deleteAllImagesProduct'])->name('product.deleteAllImagesProduct');
    Route::get('/changeStatus/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'changeStatus'])->name('admin.changeStatus');
    Route::get('/showAdmins', [\App\Http\Controllers\Admin\AdminController::class, 'showAdmins'])->name('admin.showAdmins');
});

Route::get('admin/showloginForm', [\App\Http\Controllers\Admin\LoginAdminController::class, 'showloginForm'])->name('admin.showloginForm');
Route::post('admin/login', [\App\Http\Controllers\Admin\LoginAdminController::class, 'login'])->name('admin.login');
