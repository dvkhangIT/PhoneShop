<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
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

Route::get('/', function () {
  return view('welcome');
});
Route::group(['namespace' => 'admin'], function () {
  Route::group(['prefix' => 'login', 'middleware' => 'CheckLogedIn'], function () {
    Route::get('/', [LoginController::class, 'getLogin'])->name('admin.login');
    Route::post('/', [LoginController::class, 'postLogin']);
  });
  Route::group(['prefix' => 'admin', 'middleware' => 'CheckLogedOut'], function () {
    Route::get('/home', [HomeController::class, 'getHome'])->name('admin.home');
    Route::group(['prefix' => 'category'], function () {
      Route::get('/', [CategoryController::class, 'getCate'])->name('admin.category');
      Route::post('/', [CategoryController::class, 'postCate']);
      Route::get('edit/{id}', [CategoryController::class, 'getEditCate'])->name('admin.category.edit');
      Route::post('edit/{id}', [CategoryController::class, 'postEditCate']);
      Route::get('delete/{id}', [CategoryController::class, 'getDeleteCate'])->name('admin.category.delete');
    });
  });
  Route::get('/logout', [HomeController::class, 'getLogout'])->name('admin.logout');
});
