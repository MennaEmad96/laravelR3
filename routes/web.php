<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PostController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    return view('login');
});

/*
Route::post('logged', function(){
	return 'You are logged in.';
})->name('logged');
*/

Route::get('control',[ExampleController::class,'show']);

Route::post('logged',[ExampleController::class,'showData'])->name('logged');


//car table routes
//open entry car form
Route::get('createCar',[CarController::class,'create'])->name('createCar');
//store data into car table
//Route::get('storeCar',[CarController::class,'store']);
Route::post('storeCar',[CarController::class,'store'])->name('storeCar');
Route::get('cars',[CarController::class,'index'])->name('cars');


//task port table routes
//open entry form
Route::get('createPost',[PostController::class,'create'])->name('createPost');
//store data entry form
Route::post('storePost',[PostController::class,'store'])->name('storePost');