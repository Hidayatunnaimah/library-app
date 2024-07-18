<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    BookController,
    MapLocationController,
    CategoryController,
    BookRelationController,
    FrontOfficeController
};



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

Route::prefix('admin')->group(function () {

    Route::prefix('book')->group(function () {
        Route::get('/', [BookController::class, 'index'])->name('book.index');
        Route::get('/edit/{id}', [BookController::class, 'edit'])->name('book.edit');
        Route::post('/', [BookController::class, 'store'])->name('book.store');
        Route::get('/{id}', [BookController::class, 'show'])->name('book.show');
        Route::put('/{id}', [BookController::class, 'update'])->name('book.update');
        Route::delete('/{id}', [BookController::class, 'destroy'])->name('book.destroy');
    });

    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/{id}', [CategoryController::class, 'show'])->name('category.show');
        Route::put('/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

    Route::prefix('map-location')->group(function () {
        Route::get('/', [MapLocationController::class, 'index'])->name('mapLocation.index');
        Route::get('/edit/{id}', [MapLocationController::class, 'edit'])->name('mapLocation.edit');
        Route::post('/', [MapLocationController::class, 'store'])->name('mapLocation.store');
        Route::get('/{id}', [MapLocationController::class, 'show'])->name('mapLocation.show');
        Route::put('/{id}', [MapLocationController::class, 'update'])->name('mapLocation.update');
        Route::delete('/{id}', [MapLocationController::class, 'destroy'])->name('mapLocation.destroy');
    });

    Route::prefix('book-relation')->group(function () {
        Route::get('/', [BookRelationController::class, 'index'])->name('book-relation.index');
        Route::get('/edit/{id}', [BookRelationController::class, 'edit'])->name('book-relation.edit');
        Route::post('/', [BookRelationController::class, 'store'])->name('book-relation.store');
        Route::get('/{id}', [BookRelationController::class, 'show'])->name('book-relation.show');
        Route::put('/{id}', [BookRelationController::class, 'update'])->name('book-relation.update');
        Route::delete('/{id}', [BookRelationController::class, 'destroy'])->name('book-relation.destroy');
    });
});

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/proccess-login', [AuthController::class, 'proccesLogin'])->name('auth.proccess');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');


Route::get('/', [FrontOfficeController::class, 'index'])->name('fe.index');
Route::get('/book-by-category/{id}', [FrontOfficeController::class, 'category'])->name('fe.category');
Route::post('/search', [FrontOfficeController::class, 'search'])->name('fe.search');
Route::get('/book-info/{id}', [FrontOfficeController::class, 'info'])->name('fe.info');
