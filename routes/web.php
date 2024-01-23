<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController; 
use App\Http\Controllers\DashboardController; 

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

Route::get('', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::prefix('task')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('index', [TaskController::class, 'index'])->name('index');
        Route::get('add', [TaskController::class, 'edit'])->name('add');
        Route::get('edit', [TaskController::class, 'edit'])->name('edit');
        Route::post('task_add', [TaskController::class, 'store'])->name('task_add');
        Route::get('detail', [TaskController::class, 'show'])->name('detail');
        Route::post('delete', [TaskController::class, 'delete'])->name('delete');
        Route::post('comment', [TaskController::class, 'comment'])->name('comment');
    });
    
    
});



require __DIR__ . '/auth.php';
