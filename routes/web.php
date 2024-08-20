<?php

use App\Http\Middleware\SellerMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SellerShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BuyerController;


Route::get('/', [HomeController::class, 'generalHome'])->name('general.home');
Route::get('/categories', [HomeController::class, 'getCategories'])->name('get.categories');
Route::get('/get-categories', [AdminController::class, 'addCategories'])->name('add.categories');
Route::post('/category/store', [AdminController::class, 'addNewCategory'])->name('category.store');

Route::get('/category/{id}', [AdminController::class, 'getSubCategories'])->name('get.sub-cat');
Route::post('/subCategory/store', [AdminController::class, 'addNewSubCategory'])->name('sub_category.store');

Route::get('/product', [ProductController::class, 'getProductForm'])->name('get.product-form');
Route::get('/products/subcat/{id}', [ProductController::class, 'getProductBySubCat'])->name('get.subcat.products');


Route::get('/seller', [SellerController::class, 'sellerRegForm'])->name('get.sellerForm');

Route::post('/seller/store', [SellerController::class, 'storeSeller'])->name('seller.store');
Route::post('/seller_shops', [SellerShopController::class, 'store'])->name('seller_shops.store');
Route::get('/seller_shops/{id}', [SellerShopController::class, 'getProductsByShop'])->name('get.shop.products');



Route::prefix('seller')->middleware(['auth','seller'])->group(function () {
    Route::get('/seller-home', [SellerController::class, 'sellerHome'])->name('seller.home');
});
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/users', [UserController::class, 'usersList'])->name('user_list');
Route::get('users/{user}/details', [UserController::class, 'userDetails'])->name('user_details');
Route::post('/add-user', [UserController::class, 'storeUser'])->name('store_user');

Route::get('/role', [RoleController::class, 'index'])->name('role');
Route::post('/role', [RoleController::class, 'storeRole'])->name('role.store');
Route::get('/{role}/delete', [RoleController::class, 'destroy'])->name('delete_role');
Route::post('/asign-role', [RoleController::class, 'assignRoletoUser'])->name('assign_role');

Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{id}', [ProductController::class, 'productDetails']);




Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('/buyer', [BuyerController::class, 'index'])->name('buyers.registration');

