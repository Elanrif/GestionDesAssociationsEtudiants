<?php

use App\Models\Association;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController ; 
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\User;

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

Route::get('/default-laravel', function () {
    return view('default-laravel');
});

Route::get('/',function(){ 
    $associations = Association::all() ; 
    return view('welcome',compact('associations')) ; 
})->name('welcome');

Route::get('/home',[HomeController::class,'index'])->name('home') ; 

Route::group(['namespace' => 'Auth'], function() { 
    Route::get('register',[RegisterController::class,'create'])->name('register');
    Route::post('register',[RegisterController::class ,'store']) ;
    Route::put('register/{register}',[RegisterController::class, 'update'])->name('register.update');
    Route::get('register/{register}/edit',[RegisterController::class, 'edit'])->name('register.edit') ;
    Route::get('login', [LoginController::class,'create'])->name('login') ; 
    Route::post('login', [LoginController::class,'store']) ; 
    Route::get('logout', [loginController::class,'logout'])->name('logout') ; 
});

Route::get('/admin-users',[UserController::class , 'index'])->name('admin-users');
Route::get('/admin-users/{user}/edit',[UserController::class , 'edit'])->name('admin-users.edit') ;
Route::put('/admin-users/{user}',[UserController::class,'update'])->name('admin-users.update'); 
Route::delete('/admin-users/{user}',[UserController::class,'destroy'])->name('admin-users.destroy');

Route::get('/no-send',function(){ 

  $users = User::all() ; 
  return view('admin.home',compact('users')) ;
});