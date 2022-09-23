<?php

use App\Models\Project;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/team', function () {
    
    return view('team.index', [
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


// ADMINISTRAION - Projects