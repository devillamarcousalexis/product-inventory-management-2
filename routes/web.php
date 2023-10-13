<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/view-product', 'App\Http\Controllers\ProductController@viewProduct')->name('viewProduct');
Route::get("add-product", [ProductController::class, "addProduct"]);
Route::post("save-product", [ProductController::class, "storeProduct"]);
Route::get("edit-product/{product_id}", [ProductController::class, "viewEditProduct"]);
Route::post("update-product", [ProductController::class, "submitEditProduct"]);
Route::get('/softdelete/product/{product_id}', [ProductController::class, 'SoftDelete']);
Route::get('/product/restore/{product_id}', [ProductController::class, 'Restore']);
Route::get("archived-product", [ProductController::class, "viewProductArchive"]);

Route::get('/view-category', 'App\Http\Controllers\CategoryController@viewCategory')->name('viewCategory');
Route::get("add-category", [CategoryController::class, "addCategory"]);
Route::post("save-category", [CategoryController::class, "storeCategory"]);
Route::get("edit-category/{category_id}", [CategoryController::class, "viewEditCategory"]);
Route::post("update-category", [CategoryController::class, "submitEditCategory"]);
Route::get('/softdelete/category/{category_id}', [CategoryController::class, 'SoftDelete']);
Route::get('/category/restore/{category_id}', [CategoryController::class, 'Restore']);
Route::get("archived-category", [CategoryController::class, "viewCategoryArchive"]);
