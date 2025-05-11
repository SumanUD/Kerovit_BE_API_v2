<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\RangeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\HomePageController;


Route::controller(CollectionController::class)->group(function () {
    Route::get('collections', 'index')->name('collections.index');
    Route::post('collections', 'store')->name('collections.store');
    Route::put('collections/{collection}', 'update')->name('collections.update');
    Route::delete('collections/{collection}', 'destroy')->name('collections.destroy');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', CategoryController::class);
});



Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('ranges', [RangeController::class, 'index'])->name('ranges.index');
    Route::get('ranges/get-categories', [RangeController::class, 'getCategoriesByCollection'])->name('ranges.getCategoriesByCollection');
    Route::post('ranges', [RangeController::class, 'store'])->name('ranges.store');
    Route::put('ranges/{range}', [RangeController::class, 'update'])->name('ranges.update');
    Route::delete('ranges/{range}', [RangeController::class, 'destroy'])->name('ranges.destroy');
});

Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/admin/about/create', [ProductController::class, 'aboutcreate'])->name('about.create');
Route::get('/admin/career/create', [ProductController::class, 'careercreate'])->name('career.create');
Route::get('/admin/catalogue/create', [ProductController::class, 'catacreate'])->name('cata.create');
Route::get('/admin/blog/create', [ProductController::class, 'blogcreate'])->name('blog.create');

Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store');

Route::get('/admin/products/collections/{collectionId}/categories', [ProductController::class, 'getCategories'])->name('products.getCategories');

Route::get('/admin/products/categories/{categoryId}/ranges', [ProductController::class, 'getRanges'])->name('products.getRanges');
Route::get('/products/getdata', [ProductController::class, 'showData'])->name('products.index');

Route::get('/products/data', [ProductController::class, 'getData'])->name('products.data');
Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('products.update');


Route::resource('dealers', DealerController::class);

Route::resource('homepage', HomePageController::class);
// Route::get('homepage/{id}', [HomePageController::class, 'show'])->name('homepage.show');
