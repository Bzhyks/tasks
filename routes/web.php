<?php

use App\Http\Controllers\PriorityController;
use App\Http\Controllers\TaskController;
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
})->name('root');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/language/{lang}', [\App\Http\Controllers\LangController::class, 'setLanguage'])->name('setLanguage');

Route::middleware(['auth'])->group(function () {
    Route::get('/tasks/{id}/showImage', [TaskController::class, 'showImage'])->name('task.showImage');
    Route::get('/tasks/{id}/downloadImage', [TaskController::class, 'downloadImage'])->name('task.downloadImage');
    Route::resource('priorities', PriorityController::class)->only(['index']);
    Route::resource('tasks', TaskController::class)->only(['index']);
});




Route::middleware(['auth', 'isAdmin', 'swearMiddleware'])->group(function () {
    Route::post('/tasks/search', [TaskController::class, 'search'])->name('tasks.search');
    Route::get('/tasks/search/reset', [TaskController::class, 'reset'])->name('tasks.search.reset');
    Route::post('/tasks/filter', [TaskController::class, 'filter'])->name('tasks.filter');
    Route::post('/tasks/{id}/addImage', [TaskController::class, 'addImage'])->name('tasks.addImage');
    Route::get('/tasks/{id}/edit/deleteImage', [TaskController::class, 'deleteImage'])->name('tasks.deleteImage');
    Route::resource('priorities', PriorityController::class)->except(['index']);
    Route::resource('tasks', TaskController::class)->except(['index']);
});


// Route::post('/tasks/search', [TaskController::class, 'search'])->name('tasks.search');
// Route::get('/tasks/search/reset', [TaskController::class, 'reset'])->name('tasks.search.reset');
// Route::post('/tasks/filter', [TaskController::class, 'filter'])->name('tasks.filter');

Route::resource('priorities', PriorityController::class);
Route::resource('tasks', TaskController::class);
