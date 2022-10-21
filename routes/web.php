<?php

use App\Models\Project;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/admin/test', function () {
    
    return view('layouts.admin.testpage', [
    ]);
});



// ADMINISTRAION
Route::get('/admin', function () {
    
    return view('layouts.admin.index', [
    ]);
})->name('admin-index');

// ADMINISTRAION - Categories
Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin-category');
Route::get('/admin/category/{category}/edit', [CategoryController::class, 'edit'])->name('admin-category-edit');
Route::put('/admin/category/{category}/edit', [CategoryController::class, 'update']);
Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('admin-category-create');
Route::post('/admin/category/create', [CategoryController::class, 'store'])->name('admin-category-create');
Route::get('/admin/category/delete', [CategoryController::class, 'delete'])->name('admin-category-delete');
Route::get('/admin/category/delete/{category}', [CategoryController::class, 'delete'])->name('admin-category-delete');
Route::delete('/admin/category/delete/{category}', [CategoryController::class, 'index'])->name('admin-category-index');
Route::get('/admin/category/show/{category}', [CategoryController::class, 'show'])->name('admin-category-show');

// ADMINISTRAION - Teams

Route::get('/admin/team', [TeamController::class, 'index'])->name('admin-team');
Route::get('/admin/teams/create', [TeamController::class, 'create'])->name('admin-teams-create');
Route::post('/admin/teams/create', [TeamController::class, 'store'])->name('admin-teams-create');
Route::get('/admin/teams/delete', [TeamController::class, 'delete'])->name('admin-teams-delete');
Route::get('/admin/teams/delete/{team}', [TeamController::class, 'delete'])->name('admin-teams-delete');
Route::get('/admin/teams/{team}/edit', [TeamController::class, 'edit'])->name('admin-teams-edit');
Route::put('/admin/teams/{team}/edit', [TeamController::class, 'update']);


// ADMINISTRAION - Brands
Route::get('/admin/brands', [BrandController::class, 'index'])->name('admin-brands');
Route::get('/admin/brands/{brands}/edit', [BrandController::class, 'edit'])->name('admin-brands-edit');
Route::put('/admin/brands/{brands}/edit', [BrandController::class, 'update']);
Route::get('/admin/brands/create', [BrandController::class, 'create'])->name('admin-brands-create');
Route::post('/admin/brands/create', [BrandController::class, 'store'])->name('admin-brands-create');
Route::get('/admin/brands/delete', [BrandController::class, 'delete'])->name('admin-brands-delete');
Route::get('/admin/brands/delete/{brand}', [BrandController::class, 'delete'])->name('admin-brands-delete');
Route::delete('/admin/brands/delete/{brand}', [BrandController::class, 'index'])->name('admin-brands-index');
Route::get('/admin/brands/show/{brand}', [BrandController::class, 'show'])->name('admin-brands-show');



// DEVIS

Route::get('/devis', [DevisController::class, 'index'])->name('devis-home');
Route::post('/devis/save', [DevisController::class, 'store'])->name('devis-save');

// Authentication
Route::get('/register', [AuthController::class, 'index'])->name('register-index')->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->name('register-store')->middleware('guest');

Route::get('/login', [AuthController::class, 'loginIndex'])->name('login-index')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login-login')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('login-logout')->middleware('auth');


//INVOICE
Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice-home');