<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FolderController;

use App\Http\Controllers\HomeController;

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


Route::group(['middleware' => 'auth'], function() {
    Route::get('/', [HomeController::class,'index'])->name('home');

    Route::get('/folders/{id}/tasks', [TaskController::class,'index'])->name('tasks.index');

    Route::get('/folders/create', [FolderController::class,'showCreateForm'])->name('folders.create');
    Route::post('/folders/create', [FolderController::class,'create']);

    Route::get('/folders/{id}/tasks/create', [TaskController::class,'showCreateForm'])->name('tasks.create');
    Route::post('/folders/{id}/tasks/create', [TaskController::class,'create']);

    Route::get('/folders/{id}/tasks/{task_id}/edit', [TaskController::class,'showEditForm'])->name('tasks.edit');
    Route::post('/folders/{id}/tasks/{task_id}/edit', [TaskController::class,'edit']);


});

Auth::routes();
