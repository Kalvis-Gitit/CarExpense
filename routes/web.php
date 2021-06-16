<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CostsController;


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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::redirect('/', 'car');
Route::resource('car', CarController::class);

Route::resource('category', CategoryController::class, ['except' => ['index', 'create']]);
Route::get('category/car/{id}', [CategoryController::class, 'index']);

Route::resource('costs', CostsController::class, ['except' => ['index', 'create']]);
Route::get('costs/category/{id}', [CostsController::class, 'index']);



Route::get('car/create', [CarController::class, 'create']);

Route::get('category/car/{id}/create', [CategoryController::class, 'create']);

Route::get('costs/category/{id}/create', [CostsController::class, 'create']);

//



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('dashboard', 'App\Http\Controllers\UserController@dashboard')->middleware('auth');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('dashboard', 'App\Http\Controllers\UserController@dashboard')->middleware('auth');
    
    Route::redirect('/', 'car');
    Route::resource('car', CarController::class);
    
    Route::resource('category', CategoryController::class, ['except' => ['index', 'create']]);
    Route::get('category/car/{id}', [CategoryController::class, 'index']);
    
    Route::resource('costs', CostsController::class, ['except' => ['index', 'create']]);
    Route::get('costs/category/{id}', [CostsController::class, 'index']);
    
    Route::get('car/create', [CarController::class, 'create']);
    Route::get('category/car/{id}/create', [CategoryController::class, 'create']);
    Route::get('costs/category/{id}/create', [CostsController::class, 'create']);
});