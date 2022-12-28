<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;


// register
use App\Http\Controllers\Userregistration;
// cookie
use App\Http\Controllers\CookieController;
// session
use App\Http\Controllers\SessionController;
// Validation
use App\Http\Controllers\ValidationController;
// Upload File
use App\Http\Controllers\UploadController;
// DB
use App\Http\Controllers\Dbsl;
// BasicController
use App\Http\Controllers\BasicController;

// Logging 
use Illuminate\Support\Facades\Log;



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
// Basic routes
Route::get('/vimal', function () {
    Log::debug('Log activated');
    return view('welcome');
});
// Routes parameter
Route::get('ID/{id}',function($id) {
    echo 'ID: '.$id;
 });
//  optional parameter
 Route::get('/user/{name?}', function ($name = 'TutorialsPoint') { return $name;});


//  call the controller
// Route::get('/testcontroller','TestController@test'); --->not working in L9
Route::get('/testcontroller', [TestController::class, 'index']);

// request practice
Route::get('/profile',function(){
    return view('profile');
});

// named route
Route::post('/register', [Userregistration::class, 'index'])->name('register');

// Cookie
Route::get('/cookie/set', [CookieController::class, 'setCookie']);
Route::get('/cookie/get', [CookieController::class, 'getCookie']);

// Response using header
Route::get('/header',function() {
    return response("Vimal", 200)->header('Content-Type', 'text/html');
 });
//  Response using header with attaching cookie
Route::get('/cookie',function() {
    return response("Hello", 200)->header('Content-Type', 'text/html')
       ->withcookie('dg','DGvimal');
 });

//  JSON response
Route::get('/json',function(Request $request) {
    return response()->json(['name' =>($request->cookie('dg')), 'state' => 'Gujarat']);
 });

//  Views
Route::get('/view',function(Request $request) {
    return view('viewSL',['name' =>($request->cookie('dg')), 'state' => 'Gujarat']);
 });

//  Layout
Route::get('/layout',function(){
   return view('show');
});

// redirection

// 1.redirecting route
Route::get('/test', ['as'=>'testing',function() {
    return view('show');
 }]);
 
 Route::get('redirect',function() {
    return redirect()->route('testing');
 });
//  2.redirecting controller
Route::get('/cookie/sets', [CookieController::class, 'setCookie']);

Route::get('/rdirectcontroller',function(){
    return redirect()->action([CookieController::class, 'setCookie']);
});

// Database connection
Route::get('/db', [Dbsl::class, 'index']);
// auto modal
Route::get('/md', [Dbsl::class, 'models']);

// session
Route::get('/session',[SessionController::class, 'getSession']);
Route::get('/storesession',[SessionController::class, 'storeSession']);
Route::get('/deletesession',[SessionController::class, 'deleteSession']);

// Validation
Route::get('/form',[ValidationController::class, 'index'])->name('form');
Route::post('/store',[ValidationController::class, 'store'])->name('form.store');

// File Upload
Route::get('/uploadform',[UploadController::class, 'index'])->name('uploadform');
Route::post('/uploads',[UploadController::class, 'upload'])->name('uploads');
Route::post('/file',[UploadController::class, 'store'])->name('file.store');


// Basic Crud
Route::resource('companies', BasicController::class);
Route::get('/trash-list',[BasicController::class, 'trash'])->name('companies.trash');
Route::get('/componies-restore/{id}',[BasicController::class, 'restore'])->name('companies.restore');
Route::get('/delete-componies-permanently/{id}',[BasicController::class, 'deletePermanently'])->name('delete-componies-permanently');