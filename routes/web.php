<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TypeController;
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

Route::get('/', [GuestHomeController::class, 'index']);


Route::middleware(['auth', 'verified'])->name('admin.')->prefix('/admin')->group(function () {
    Route::get('/admin', [AdminHomeController::class, 'index'])->name('home');
    Route::patch('/projects/{project}/toggle', [ProjectController::class, 'toggle'])->name('projects.toggle');
    Route::resource('projects', ProjectController::class);
    Route::resource('types', TypeController::class);
    Route::resource('technologies', TechnologyController::class);
});


Route::middleware('auth')->name('profile.')->prefix('/profile')->group(function () {
    Route::get('', [ProfileController::class, 'edit'])->name('edit');
    Route::patch('', [ProfileController::class, 'update'])->name('update');
    Route::delete('', [ProfileController::class, 'destroy'])->name('destroy');
});

require __DIR__ . '/auth.php';
