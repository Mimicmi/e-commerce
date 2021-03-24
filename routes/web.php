<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;
Use App\Http\Controllers\FrontProductListController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index/test', function() {
    return view('test');
});

Route::get('/subcategories/{id}', [ProductController::class, 'loadSubCategories']);

Route::get('/', [FrontProductListController::class, 'index']);
Route::get('/product/{id}', [FrontProductListController::class, 'show']);


Route::group(['prefix'=>'auth','middleware'=>['auth','isAdmin']],function(){
        Route::get('/dashboard', function() {
        return view('admin.dashboard');
    });
    Route::resource('category', CategoryController::class);
    Route::resource('subcategory', SubcategoryController::class);
    Route::resource('product', ProductController::class);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
