<?php

use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [PageController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('destroy');
});

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    //tutte le rotte protette da middleware
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('type-projects', [TypeController::class, 'typeProjects'])->name('typeProjects');
    //rotte CRUD
    Route::resource('projects', ProjectController::class);
    Route::resource('types', TypeController::class)->except(['show', 'edit', 'create']);
    Route::resource('technologies', TechnologyController::class)->except(['show', 'edit', 'create']);
});

require __DIR__ . '/auth.php';
