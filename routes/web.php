<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// route user
Route::get('/', [FrontendController::class, 'getHome']);
Route::get('detail/{id}/{slug}.html', [FrontendController::class, 'getDetail']);
Route::get('/category/{id}/{slug}.html', [FrontendController::class, 'getCategory']);
Route::post('/detail/{id}/{slug}.html', [FrontendController::class, 'postComment']);
Route::get('/search', [FrontendController::class, 'getSearch']);
// route admin
Route::group(['namespace' => 'admin'], function () {
  Route::group(['prefix' => 'login', 'middleware' => 'CheckLogedIn'], function () {
    Route::get('/', [LoginController::class, 'getLogin'])->name('admin.login');
    Route::post('/', [LoginController::class, 'postLogin']);
  });
  Route::group(['prefix' => 'admin', 'middleware' => 'CheckLogedOut'], function () {
    Route::get('/home', [HomeController::class, 'getHome'])->name('admin.home');
    // router category
    Route::group(['prefix' => 'category'], function () {
      Route::get('/', [CategoryController::class, 'getCate'])->name('admin.category');
      Route::post('/', [CategoryController::class, 'postCate']);
      Route::get('edit/{id}', [CategoryController::class, 'getEditCate'])->name('admin.category.edit');
      Route::post('edit/{id}', [CategoryController::class, 'postEditCate']);
      Route::get('delete/{id}', [CategoryController::class, 'getDeleteCate'])->name('admin.category.delete');
    });
    Route::get('/logout', [HomeController::class, 'getLogout'])->name('admin.logout');
    // router product
    Route::group(['prefix' => 'product'], function () {
      Route::get('/', [ProductController::class, 'getProduct'])->name('admin.product');
      Route::post('/', [ProductController::class, 'postProduct']);
      Route::get('add', [ProductController::class, 'getAddProduct'])->name('admin.product.add');
      Route::post('add', [ProductController::class, 'postAddProduct']);
      Route::post('/', [ProductController::class, 'postProduct']);
      Route::get('edit/{id}', [ProductController::class, 'getEditProduct'])->name('admin.product.edit');
      Route::post('edit/{id}', [ProductController::class, 'postEditProduct']);
      Route::get('delete/{id}', [ProductController::class, 'getDeleteProduct'])->name('admin.product.delete');
    });
  });
});
