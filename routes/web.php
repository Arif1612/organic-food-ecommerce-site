<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Routing\Route as RoutingRoute;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/categories/pdf', [CategoryController::class, 'downloadPdf'])->name('categories.pdf');
Route::get('/categories/excel', [CategoryController::class, 'downloadExcel'])->name('categories.excel');

// Softdelte Route
Route::get('/categories-trash', [CategoryController::class, 'trash'])->name('categories.trash');
Route::get('/categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
Route::delete('/categories/{id}/permanent/delete', [CategoryController::class, 'delete'])->name('categories.delete');
Route::get('/categories/{id}/softDeleteShow', [CategoryController::class, 'softDeleteShow'])->name('categories.softDeleteShow');

// Categories Crud route
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::delete('/categories/{id}/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::patch('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');


// Resource Route
Route::resource('products', ProductController::class);
Route::resource('brands', BrandController::class);
