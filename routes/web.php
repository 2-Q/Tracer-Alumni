<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfessionController;

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


Auth::routes();

Route::get('/', HomeController::class, 'index')->name('home');
Route::middleware('auth')->group(function () {
    // Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::prefix('professions')->group(function () {
        Route::get('create', [ProfessionController::class, 'create'])->name('professions.create');
        Route::post('create', [ProfessionController::class, 'store']);

        Route::get('{profession:slug}/edit', [ProfessionController::class, 'edit'])->name('professions.edit
        ');
        Route::put('{profession:slug}/edit', [ProfessionController::class, 'update']);

        Route::get('index', [ProfessionController::class, 'index'])->name('professions.index');
        Route::get('dashboard', [ProfessionController::class, 'dashboard'])->name('professions.dashboard');
        Route::get('table', [ProfessionController::class, 'table'])->name('professions.table');
        Route::delete('{profession:slug}/delete', [ProfessionController::class, 'destroy']);
        Route::get('/{slug}', [ProfessionController::class, 'show'])->name('professions.show');
        Route::get('{profession:slug}/detail', [ProfessionController::class, 'detail'])->name('professions.detail');
    });
    Route::prefix('admin')->group(function () {
        Route::get('index', [AdminController::class, 'index'])->name('admin.index');
        Route::get('professions', [AdminController::class, 'professions'])->name('admin.professions');
        Route::get('index', [AdminController::class, 'index'])->name('admin.index');


        //CRUD
        Route::get('create', [AdminController::class, 'create'])->name('admin.create');
        Route::post('create', [AdminController::class, 'store']);

        Route::get('{profession:slug}/edit', [AdminController::class, 'edit'])->name('admin.edit
        ');
        Route::put('{profession:slug}/edit', [AdminController::class, 'update']);

        //CRUD NEWS
        Route::get('news/index', [AdminController::class, 'news'])->name('admin.news.index');
        Route::get('news/create', [AdminController::class, 'create'])->name('admin.news.create');
        Route::post('news/create', [AdminController::class, 'store']);
    });
});
