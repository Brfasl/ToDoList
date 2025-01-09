<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

//test routes
Route::get('/test', function () {
    return view('panel.layout.app');
});

//task routeları start
Route::get('/panel/tasks/create',[TaskController::class ,'createPage'])->name('panel.createTaskPage');
Route::post('/panel/tasks/add',[TaskController::class ,'addTask'])->name('panel.addTask');

    //task routeları end
