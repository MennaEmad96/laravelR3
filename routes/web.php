<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;

use App\Mail\MailableName;

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

// Route::get('login', function () {
//     return view('login');
// });


Route::get('control',[ExampleController::class,'show']);
// Route::post('logged',[ExampleController::class,'showData'])->name('logged');


//car table routes
//open entry car form
Route::get('createCar',[CarController::class,'create'])->middleware('verified')->name('createCar');
//store data into car table
//Route::get('storeCar',[CarController::class,'store']);
Route::post('storeCar',[CarController::class,'store'])->name('storeCar');
Route::get('cars',[CarController::class,'index'])->name('cars');
//update car
Route::get('editCar/{id}',[CarController::class,'edit']);
Route::put('updateCar/{id}',[CarController::class,'update'])->name('updateCar');
//show car
Route::get('showCar/{id}',[CarController::class,'show']);
//delete
Route::get('deleteCar/{id}',[CarController::class,'destroy']);
Route::get('trashed',[CarController::class,'trashed'])->name('trashed');
Route::get('forceDelete/{id}',[CarController::class,'forceDelete'])->name('forceDelete');
Route::get('restoreCar/{id}',[CarController::class,'restore'])->name('restoreCar');



//task port table routes
//open entry form
Route::get('createPost',[PostController::class,'create'])->name('createPost');
//store data entry form
Route::post('storePost',[PostController::class,'store'])->name('storePost');
//show all post data
Route::get('posts',[PostController::class,'index'])->name('posts');
//show sigle item
Route::get('showPost/{id}',[PostController::class,'show']);
//update
Route::get('editPost/{id}',[PostController::class,'edit']);
Route::put('updatePost/{id}',[PostController::class,'update'])->name('updatePost');
//delete
Route::get('deletePost/{id}',[PostController::class,'destroy']);
//taskDay6
Route::get('trashedPost',[PostController::class,'trashed'])->name('trashedPost');
Route::get('restorePost/{id}',[PostController::class,'restore'])->name('restorePost');
Route::get('forceDeletePost/{id}',[PostController::class,'forceDelete'])->name('forceDeletePost');


//day 7
Route::get('test',[CarController::class,'test'])->name('test');
//OR
// Route::get('test', function () {
//     return view('test');
// });
//open form to upload image
Route::get('image', function () {
    return view('image');
});
//upload the image
Route::post('imageUpload',[ExampleController::class,'upload'])->name('imageUpload');



//page routes
Route::get('index',[PageController::class,'index'])->name('index');
Route::fallback(PageController::class)->name('404');
Route::get('contact',[PageController::class,'contact'])->name('contact');
Route::get('blog',[PageController::class,'blog'])->name('blog');
Route::get('portfolio',[PageController::class,'portfolio'])->name('portfolio');


Auth::routes(['verify'=>true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('test20',[ExampleController::class,'createSession']);



//email, contact form data
Route::post('email',[ExampleController::class,'email'])->name('email');

Route::get('/testroute', function(){
    $name = "Menna";
    Mail::to('eng_peter_elias@gmail.com')->send(new MailableName($name));
})->name('testroute');

