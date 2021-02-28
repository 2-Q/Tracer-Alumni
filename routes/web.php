<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::group(['middleware' => ['auth', 'checkRole:siswa']],function(){
	Route::get('/', function () {
	    return redirect('profileSiswa');
	});
	Route::prefix('profileSiswa')->group(function(){
		Route::get('/', [ProfileController::class, 'index'])->name('profile');
		Route::post('/', [ProfileController::class, 'prestasi']);
		Route::delete('/', [ProfileController::class, 'deletePrestasi']);
		Route::put('/', [ProfileController::class, 'pengalaman']);
		Route::patch('/', [ProfileController::class, 'deletePengalaman']);

		Route::get('/edit', [ProfileController::class, 'edit'])->name('profileEdit');
		Route::post('/edit', [ProfileController::class, 'update']);
		Route::put('/edit', [ProfileController::class, 'updateFoto']);

		Route::get('/password', function () {return view('profile.gantiPassword');})->name('profilePassword');
		Route::post('/password', [ProfileController::class, 'updatePassword']);
	});
});


Auth::routes();

	Route::prefix('register')->group(function(){
		Route::put('/', [RegisterController::class, 'checkNISN']);
		Route::patch('/', [RegisterController::class, 'submit']);
		Route::get('/intro', [RegisterController::class, 'introForm'])->name('intro');
		Route::post('/intro', [RegisterController::class, 'introPost']);
	});


		Route::get('/coba/{id}', [RegisterController::class, 'coba']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
