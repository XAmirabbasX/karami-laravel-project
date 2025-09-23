<?php


use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\ShippingController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\User\UserController::class, 'index'])->name('index');
Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('/showProfileInfo/{id}', [UserController::class, 'showProfileInfo'])->name('user.showProfileInfo');
    Route::get('/showProfileAddresses/{id}', [UserController::class, 'showProfileAddresses'])->name('user.showProfileAddresses');
    Route::post('/showProfileAddresses/cities', [UserController::class, 'getCitiesByProvinceId']);
    Route::post('/addAddressToDB', [\App\Http\Controllers\User\AddressesController::class, 'addAddressToDB'])->name('user.addAddressToDB');
    Route::get('/editAddress/{address_id}', [\App\Http\Controllers\User\AddressesController::class, 'editAddress'])->name('user.editAddress');
    Route::get('/deleteAddress/{address_id}', [\App\Http\Controllers\User\AddressesController::class, 'deleteAddress'])->name('user.deleteAddress');
    Route::get('orderDetails/{orderTrack}', [UserController::class, 'orderDetails'])->name('User.orderDetails');
    Route::get('userOrders', [UserController::class, 'userOrders'])->name('User.userOrders');
    Route::get('userInfos', [UserController::class, 'userInfos'])->name('User.userInfos');
    Route::post('addUserInfo', [UserController::class, 'addUserInfo'])->name('User.addUserInfo');
});

Route::get('/login', [\App\Http\Controllers\User\LoginController::class, 'index'])->name('login');
Route::post('/loginRequest', [\App\Http\Controllers\User\LoginController::class, 'loginRequest'])->name('loginRequest');
Route::get('/verify', [\App\Http\Controllers\User\LoginController::class, 'verify'])->name('verify');
Route::post('/verifyRequest', [\App\Http\Controllers\User\LoginController::class, 'verifyRequest'])->name('verifyRequest');
Route::get('/singleProduct/{tracking_code}/{title?}', [\App\Http\Controllers\User\ProductsController::class, 'singleProduct'])->name('user.singleProduct');
Route::get('/addToCart/{id}', [\App\Http\Controllers\User\CartController::class, 'addToCart'])->name('User.addToCart');
Route::get('/cart', [\App\Http\Controllers\User\CartController::class, 'showCart'])->name('User.cart');
Route::get('/logout', [\App\Http\Controllers\User\LoginController::class, 'logout'])->name('User.logout');

Route::post('cart/plus/{id}', [\App\Http\Controllers\User\CartController::class, 'plus']);
Route::post('cart/minus/{id}', [\App\Http\Controllers\User\CartController::class, 'minus']);

Route::get('shipping', [\App\Http\Controllers\User\ShippingController::class, 'showShipping'])->name('User.showShipping');
Route::get('checkShipping', [\App\Http\Controllers\User\ShippingController::class, 'checkShipping'])->name('User.checkShipping');
Route::get('payment', [ShippingController::class, 'showPayment'])->name('User.showPayment');
Route::post('changeAddress', [ShippingController::class, 'changeAddress'])->name('User.changeAddress');
Route::get('goToPayment', [\App\Http\Controllers\User\PaymentController::class, 'goToPayment'])->name('User.goToPayment');
Route::get('callbackUrl', [\App\Http\Controllers\User\PaymentController::class, 'callbackUrl'])->name('User.callbackUrl');

Route::any('search/{sort?}', [\App\Http\Controllers\User\SearchController::class, 'search'])->name('User.search');
