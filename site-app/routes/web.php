<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AmbulatoryController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SheduleController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\PriceController;


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

// Route::get('/', function () {
//     return view('/site/index');
// });

Route::get('/', [MainController::class, 'showLast'])->name('index');
Route::get('/blog', [PostController::class, 'blog'])->name('blog');
Route::get('blog/{id}', [PostController::class, 'singlePost']);
Route::get('/search', [DoctorController::class, 'search'])->name('search');
Route::get('/search-sp', [DoctorController::class, 'searchSpeciality'])->name('search-sp');
Route::get('/all', [DoctorController::class, 'showAll'])->name('all');
Route::get('selecttime', [SheduleController::class, 'selectTime'])->name('selecttime');
Route::get('/appointment/{doctor_id}',[DoctorController::class, 'showOne']);
Route::get('/online', [DoctorController::class, 'showOnline'])->name('online');
Route::get('/price', [PriceController::class, 'showAnalise'])->name('price');
Route::get('/search-r', [PriceController::class, 'search'])->name('price-search');



Route::resource('doctors', DoctorController::class);
Route::resource('ambulatories', AmbulatoryController::class);
Route::resource('menus', MenuController::class);
Route::resource('posts', PostController::class);
Route::resource('shedules', SheduleController::class);
Route::resource('specialities', SpecialityController::class);


