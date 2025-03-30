<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;  // Auth sınıfını dahil et

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

// Eğer kullanıcı giriş yapmamışsa, giriş sayfasına yönlendirilir
Route::get('/', function () {
    return Auth::check() ? redirect()->route('panel.indexTask') : view('auth.login');
});

// Task rotaları
Route::get('/panel/tasks/create', [TaskController::class, 'createPage'])->name('panel.createTaskPage');
Route::post('/panel/tasks/add', [TaskController::class, 'addTask'])->name('panel.addTask');
Route::get('/panel/tasks/index', [TaskController::class, 'indexPage'])->name('panel.indexTask');

// Kategori rotaları
Route::get('panel/categories/index', [CategoryController::class, 'index'])->name('panel.categoryIndex');
Route::get('panel/categories/createPage', [CategoryController::class, 'createPage'])->name('panel.categoryCreatePage');
Route::post('panel/categories/addCategory', [CategoryController::class, 'postCategory'])->name('panel.categoryAdd');
Route::get('panel/categories/update/{id}', [CategoryController::class, 'updatePage'])->name('panel.categoryUpdatePage');
Route::post('panel/categories/updatePost', [CategoryController::class, 'updateCategory'])->name('panel.updateCategory');
Route::post('panel/categories/updatePostTest/{id}', [CategoryController::class, 'updateCategoryTest'])->name('panel.updateCategoryTest');
Route::get('panel/categories/deleteCategory/{id}', [CategoryController::class, 'categoryDelete'])->name('panel.categoryDelete');

// Giriş yaptıktan sonra yönlendirme
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Giriş yaptıktan sonra doğrudan tasks sayfasına yönlendir
    Route::get('/dashboard', function () {
        return redirect()->route('panel.indexTask');
    });
});
