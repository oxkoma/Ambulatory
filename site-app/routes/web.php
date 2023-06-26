<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AmbulatoryController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SheduleController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;


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

Route::name('user.')->group(function() {
	Route::view('/private', 'private')->middleware('auth')->name('private');
	
	Route::get('/login', function() {
		if(Auth::check()) {
			return redirect(route('user.private'));
		}
		return view('auth/login');
	})->name('login');
	Route::post('/login', [LoginController::class, 'login']);
	Route::get('/logout', [function() {
		Auth::logout();
		return redirect(route('index'));
	}])->name('logout');
	Route::get('/registration', function(){
		if(Auth::check()) {
			return redirect(route('user.private'));
		}
		return view('auth/registration');
	})->name('registration');

	Route::post('/registration', [RegisterController::class,'save']);
});

Route::resource('doctors', DoctorController::class);
Route::resource('ambulatories', AmbulatoryController::class);
Route::resource('menus', MenuController::class);
Route::resource('posts', PostController::class);
Route::resource('shedules', SheduleController::class);
Route::resource('specialities', SpecialityController::class);


