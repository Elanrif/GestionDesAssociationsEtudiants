<?php

use App\Http\Controllers\AssociationController;
use App\Models\Association;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController ;
use App\Http\Controllers\BureauController;
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

// tout simplement cette view pour pouvoir passer des models a la vue c'est tout 
// la vue show ne doit pas heriter de son père car alors il existerait la variable $associatoins avec (s) 
// mais dans show on veut seulement association sans ('s) 
// donc la solution il ne dois pas extendre de admin parent . 
Route::get('/admin_home',function() { 

    $associations = Association::all() ; 

    return view('admin.home',['associations'=>$associations]); 
});


Route::get('/admin-users',[UserController::class , 'index'])->name('admin-users');
Route::get('/admin-users/{user}/edit',[UserController::class , 'edit'])->name('admin-users.edit') ;
Route::put('/admin-users/{user}',[UserController::class,'update'])->name('admin-users.update'); 
Route::delete('/admin-users/{user}',[UserController::class,'destroy'])->name('admin-users.destroy');

Route::post('/users-image',[UserController::class,'images'])->name('users-image.store') ;//ici c'est pas l'administrateur qui va modifier mais la personne authentifié  . normalement cette ligne doit etre dans le namesapce Auth() mais bon 
Route::post('/users-comment',[UserController::class,'comments'])->name('users-comment.save');
Route::get('/home/user-message',[UserController::class,'messages'])->name('messages') ;


Route::resource('admin-asso',AssociationController::class)->parameters([
    'admin-asso' => 'association'
]); 

Route::get('/admin-asso/create/{association}/bureau',[BureauController::class,'create'])->name('create.bureau');
// j'ai ajouté {association} voir la vue bureau/create; avant d'aller au controller on passe par ici d'abord
// la raison est simple , je veux une fois créer le membre du bureau revenir a la view show , pour cela je dois avoir l'association
Route::post('/admin-asso/{association}/store/bureau',[BureauController::class,'store'])->name('store.bureau');
Route::delete('/admin-asso/delete/{bureau}',[BureauController::class,'delete'])->name('delete.bureau') ; 

Route::get('/admin-asso/MembreBureau/id/{bureau}/edit',[BureauController::class,'edit'])->name('edit.bureau') ;
Route::put('/admin-asso/update/{bureau}',[BureauController::class, 'update'])->name('update.bureau') ; 

//'search' pour la recherche des utilisateur 
Route::get('/user/Search',[AssociationController::class,'search'])->name('admin.userSearch') ; 


Route::get('/admin-asso/association/{association}',[BureauController::class,'userindex'])->name('user.association') ; 
Route::post('association/{association}/suivis',[BureauController::class , 'suivisUser'])->name('suivis.attach');
Route::delete('association/suivis/{association}',[BureauController::class , 'suivisDelete'])->name('suivis.delete');

Route::post('/admin-asso/membreCreate',[BureauController::class,'membreCreate'])->name('admin-asso.membre_create') ; 
Route::delete('/admin-asso/membreDestroy/{user}',[BureauController::class,'membreDestroy'])->name('admin-asso.membre_destroy') ;

// pour les évènements 

Route::post('/admin-asso/evenements' ,[AssociationController::class , 'eventStore'])->name('adminevent.store') ; 
Route::put('admin-asso/evenement/update',[AssociationController::class , 'eventUpdate'])->name('update.evenement');
Route::delete('/admin-asso/evenement/delete/{evenement}',[AssociationController::class,'eventDelete'])->name('delete.event');
//pour le contact
Route::get('contact',function() { 

    $associations = Association::all() ; 
    return view('contact.index',['associations'=>$associations]) ; 
});