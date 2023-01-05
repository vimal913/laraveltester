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
// csrfController
use App\Http\Controllers\AjaxCSRFController;

use App\Http\Controllers\PostController;

// file upload ajax 
use App\Http\Controllers\FileUploadController;

// serialize 
use App\Http\Controllers\serializeController;

// Logging 
use Illuminate\Support\Facades\Log;

// factory
use Illuminate\Database\Eloquent\Factories\Factory;

// Artisan console
use Illuminate\Support\Facades\Artisan;

// mail
// use App\Http\Controllers\EmailController;

use App\Http\Controllers\MailController;
// use Illuminate\Support\Facades\Mail;
// use App\Mail\EmailDemo;

// Helper
use App\Http\Controllers\HelperController;

// File Storage
use App\Http\Controllers\FileController;

// custom authentication controller
use App\Http\Controllers\SampleController;




// app()->bind('Game',function(){
//     return "Vimal";
// });
// dd(app());
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
    // Log::debug('Log activated');
    // Log::channel('slack')->debug('Log in different channel');
    Log::stack(['single','daily'])->debug('Logging by syeed');
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
// Route::get('/layout',function(){
//    return view('show');
// });

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
// Route::resource('companies', BasicController::class);

Route::get('/trash-list',[BasicController::class, 'trash'])->name('companies.trash');  //trash table
Route::get('/componies-restore/{id}',[BasicController::class, 'restore'])->name('companies.restore'); //restore data
Route::get('/delete-componies-permanently/{id}',[BasicController::class, 'deletePermanently'])->name('delete-componies-permanently'); //delete Permanently


// csrf ajax
// Route::get('/ajaxcsrf',[AjaxCSRFController::class, 'view']);
// Route::post('/getdata',[AjaxCSRFController::class, 'index'])->name('testing');

Route::controller(AjaxCSRFController::class)->group(function(){
    Route::get('csrf', 'view');
    Route::post('csrf', 'store')->name('csrf.store');
});
Route::controller(PostController::class)->group(function(){
    Route::get('posts', 'index');
    Route::post('posts', 'store')->name('posts.store');
});

// file upload ajax
Route::controller(FileUploadController::class)->group(function(){
    Route::get('file-upload', 'index');
    Route::post('file-upload', 'store')->name('file.store');
});

// serialize
Route::controller(serializeController::class)->group(function(){
    Route::get('serialize', 'index');
    Route::post('serializestore', 'store')->name('s.store');
});

// Middleware

//1.group middleware
Route::group(['middleware'=>['protected']],function(){
    // Route::resource('companies', BasicController::class);
});
//2.route middleware
Route::get('/layout',function(){
    return view('show');
 })->middleware('age');


// Associations
Route::get('/users', function(){

    // $user = \App\Models\User::factory()->create(); 
    // // \App\Models\Address::factory()->count(3)->create(); 
    // $address = new \App\Models\Address([
    //     'country' => 'china'
    // ]);

    // $address->user()->associate($user);
    // $address->save();

    // $users = \App\Models\User::has('pen')->with('pen')->get(); //has helps to validate the value 
    $users = \App\Models\User::with('address')->get();
// $users[0]->addressess()->create([
//     'country' => 'Nepal'
// ]);

    return view('users.index', compact('users'));
    // $addresses= \App\Models\Address::with('owner')->get();
    // dd($addresses);
    //  return view('users.index', compact('addresses'));
});
Route::get('/pen',function(){
//     \App\Models\tag::create([
//    'name' => 'Laravel'
//     ]);
//     \App\Models\tag::create([
//         'name' => 'PHP'
//     ]);
//     \App\Models\tag::create([
//         'name' => 'Javascript'
//     ]);

// store tag_id and pen in id to pen_tag table   
// $tag = \App\Models\tag::first();
$pen = \App\Models\pen::first();
// dd($pen->tags->first()->pivot);

// // $pen->tags()->detach([2]);
// $pen->tags()->sync([1,3]);

$pen->tags()->sync([
    2 => [
        'status' => 'approved'
    ]
]);

// // $pen->tags()->attach([2,3,4]);
// // store tag_id and pen in id to pen_tag table   

    $pens = \App\Models\pen::with(['user','tags'])->get();

    return view('users.pen',compact('pens'));
});

// tags Route
Route::get('/tags',function(){
$tags = \App\Models\tag::with('pens')->get();
return view('users.tags',compact('tags'));
});

// projects route----has-many-through

Route::get('/projects',function(){

    // $project = \App\Models\Project::create([
    //     'title' => 'Project B'
    // ]);

    // $user1 = \App\Models\User::create([
    //     'name' => 'User 3',
    //     'email' => 'Users3@gmail.com',
    //     'password' => Hash::make('password'),
    //     'project_id' => $project->id
    // ]);
    // $user2 = \App\Models\User::create([
    //     'name' => 'User 4',
    //     'email' => 'Users4@gmail.com',
    //     'password' => Hash::make('password'),
    //     'project_id' => $project->id
    // ]);
    // $user3 = \App\Models\User::create([
    //     'name' => 'User 5',
    //     'email' => 'Users5@gmail.com',
    //     'password' => Hash::make('password'),
    //     'project_id' => $project->id
    // ]);

    // $task1 = \App\Models\Task::create([
    //     'title' => 'Task Title4 for project 2 by user 3',
    //     'user_id' => $user1->id
    // ]);
    // $task2 = \App\Models\Task::create([
    //     'title' => 'Task Title5 for project 2 by user 3',
    //     'user_id' => $user1->id
    // ]);
    // $task3 = \App\Models\Task::create([
    //     'title' => 'Task Title3',
    //     'user_id' => $user2->id
    // ]);

    $projects = \App\Models\Project::find(6);
    
    // return $projects->tasks;
    dd($projects->task);
    // return $projects->users[0]->tasks;
});

// artisan console to create user

Route::get("/command",function(){
    Artisan::call("add:user");
});
// artisan console to create user



// mail
Route::get("/mail",[MailController::class,'sendEmail']);
// Route::get('/send-email',function(){
//     $mailData = [
//         'name' => 'Test Name',
//         'dob' => '22/04/1998'
//     ];

//     Mail::to('vimalbu170543@gmail.com')->send(new EmailDemo($mailData));
//     dd("Mail Sent Successfully");
// });


// queue
Route::get('email-test', function(){
  
    $details['email'] = 'vimaldg@yopmail.com';
  
    dispatch(new App\Jobs\SendEmailJob($details));
  
    dd('done');
});

// Helper

Route::controller(HelperController::class)->group(function(){
    Route::get('array','array');
});

// localization
Route::get('/localize/{lang}',function($lang){
    App::setLocale($lang);
    return view('localizeProfile');
});

// File Storage

Route::get('/filestorage',[FileController::class,'index']);
Route::post('/storages',[FileController::class,'storages'])->name('s.storage');

// -------------------------------------------------------------------------------------
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout'); //my line not working
// Route::get('logout', [Auth\AuthController::class,'logout']);
// ----------------------------------------------------------------------------------


// custom authentication
Route::controller(SampleController::class)->group(function(){
    Route::get('logins','index')->name('logins');
    Route::get('registration','registration')->name('registration');
    // Route::get('logout','logout')->name('logout');
});