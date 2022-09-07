<?php

use App\Http\Controllers\User\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware'=> 'auth'], function (){
    Route::group([
        'prefix' => 'admin',
        'middleware'=>'is_admin',
        'as'=>'admin.',
    ], function (){
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
 
    });
 
     Route::group([
         'prefix' => 'user',
         'as'=>'user.',
     ], function (){
         Route::resource('categories', \App\Http\Controllers\User\CategoryController::class);
     });
 });




Route::group(['middleware'=> 'auth'], function (){
   Route::group([
       'prefix' => 'admin',
       'middleware'=>'is_admin',
       'as'=>'admin.',
   ], function (){
       Route::resource('tasks', \App\Http\Controllers\Admin\TaskController::class);

   });

    Route::group([
        'prefix' => 'user',
        'as'=>'user.',
    ], function (){
        Route::resource('tasks', TaskController::class);
    });
});
 