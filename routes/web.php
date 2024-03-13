<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task\IndexController;
use App\Http\Controllers\Task\StoreController;
use App\Http\Controllers\Task\ShowController;
use App\Http\Controllers\Task\CreateController;
use App\Http\Controllers\Task\EditController;
use App\Http\Controllers\Task\UpdateController;
use App\Http\Controllers\Task\DestroyController;


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

//Route::resource('task', TaskController::class);

Route::group(['prefix' => 'tasks', 'as' => 'task.'], function () {
    Route::get('/', IndexController::class)->name('index');
    Route::get('create', CreateController::class)->name('create');
    Route::post('/', StoreController::class)->name('store');
    Route::get('{task}', ShowController::class)->name('show');
    Route::get('{task}/edit', EditController::class)->name('edit');
    Route::patch('{task}', UpdateController::class)->name('update');
    Route::delete('{task}', DestroyController::class)->name('destroy');
});

// Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
// Route::get('/tasks/create', [TaskController::class, 'create'])->name('task.create');
// Route::post('/tasks', [TaskController::class, 'store'])->name('task.store');
// Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('task.show');
// Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('task.edit');
// Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('task.update');
// Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('task.destroy');



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

require __DIR__.'/auth.php';
