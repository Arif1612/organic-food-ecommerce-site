<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

require __DIR__ . '/auth.php';


Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });


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


    // products

    Route::get('/products/pdf', [ProductController::class, 'downloadPdf'])->name('products.pdf');
    Route::get('/products/excel', [ProductController::class, 'downloadExcel'])->name('products.excel');


    // Softdelte Route
    Route::get('/products-trash', [ProductController::class, 'trash'])->name('products.trash');
    Route::get('/products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');
    Route::delete('/products/{id}/permanent/delete', [ProductController::class, 'delete'])->name('products.delete');
    Route::get('/products/{id}/softDeleteShow', [ProductController::class, 'softDeleteShow'])->name('products.softDeleteShow');


    // Resource Route
    Route::resources([
        'products' => ProductController::class,
        'brands' => BrandController::class,
    ]);

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
        Route::get('/{user}/change-role', [UserController::class, 'changeRole'])->name('users.change_role');
        Route::patch('/{user}/change-role', [UserController::class, 'updateRole'])->name('users.update_role');
    });

    // Route::resource('products', ProductController::class);
    // Route::resource('brands', BrandController::class);

    // Route::fallback(function () {
    //     echo "Apnar url thik nai";
    // });

});
