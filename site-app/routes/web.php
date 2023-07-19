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
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserCabinetController;


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

Route::get('/contact', function () {
	return view('site/contact');
})->name('contact');

Route::post('/appointment/{doctor_id}', [OrderController::class, 'save'])->name('order-save');
Route::post('/contact', [MainController::class, 'submitContact'])->name('contact-form');

Route::name('user.')->group(function() {
	Route::view('/admin/home', 'admin/home')->middleware('auth')->name('home-admin');
	Route::view('/user/home', 'user/home')->middleware('auth')->name('home-user');
	
	Route::get('/login', function() {
		if(Auth::check()) {
			if(Auth::user()->usertype == 'user') {
				return redirect(route('user.home-user'));
			}
			return redirect(route('user.home-admin'));
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
			return redirect(route('user.home-user'));
		}
		return view('auth/registration');
	})->name('registration');

	Route::post('/registration', [RegisterController::class,'save']);
});
Route::middleware(['auth', 'user'])->group(function(){
	Route::get('/cabinet', [UserCabinetController::class, 'showUserData'])->name('user-data');
	Route::get('/cabinet/edit', [UserCabinetController::class, 'editUserData'])->name('edit-user-data');
	Route::get('/appoint-order', [UserCabinetController::class, 'showOrder'])->name('show-user-order');
	
	Route::put('/cabinet/edit', [UserCabinetController::class, 'updateUserData'])->name('update-user-data');
});	

Route::middleware(['auth', 'admin'])->group(function (){
	Route::resource('orders', OrderController::class);
	Route::resource('doctors', DoctorController::class);
	Route::resource('ambulatories', AmbulatoryController::class);
	Route::resource('menus', MenuController::class);
	Route::resource('posts', PostController::class);
	Route::resource('shedules', SheduleController::class);
	Route::resource('specialities', SpecialityController::class);
	Route::get('/status={status}', [OrderController::class, 'sortStatus'])->name('filter-status');
	Route::get('/get-ambulatories', [SheduleController::class, 'sortAmbulatories'])->name('ambulatories-sort');
});