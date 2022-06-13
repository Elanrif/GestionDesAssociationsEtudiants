<?php

use App\Http\Controllers\AssociationController;
use App\Models\Association;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController ;
use App\Http\Controllers\BureauController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\Evenement;
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

Route::get('/',function(){ 
    $associations = Association::all() ; 
    $evenements = Evenement::all() ; 
    return view('welcome',compact(['associations','evenements'])) ; 
})->name('welcome');



Route::get('/layouts/app',function() { 
    $associations = Association::all() ; 

    return view('layouts.app',compact('assocations')); 
});

Route::get('/default-laravel', function () {
    return view('default-laravel');
});

Route::delete('/delete/reponse',[HomeController::class , 'deleted'])->name('contactuser.deleted') ; 

// compte admin 
Route::get('/admin-moncompte' ,[HomeController::class , 'compte'])->name('admin-moncompte') ; 

// pour  la page home de l'utilisateur 
Route::get('/home',[HomeController::class,'index'])->name('home') ; 

// ici j'herite d'un autre @yield: ici /home/editer la route c'est route('home.general) et vice-versa 
Route::get('/home/editer',[HomeController::class,'general'])->name('home.general');
Route::put('/home/general/{general}',[HomeController::class,'UpdateGeneral'])->name('register.general');
Route::get('/home/general',[HomeController::class,'edit'])->name('home.edit');
Route::get('/home/password',[HomeController::class,'password'])->name('home.password');
Route::put('/home/Register/password',[HomeController::class,'UpdatePassword'])->name('register.password');
Route::get('/home/show/delete',[HomeController::class,'showdelete'])->name('showdelete');
Route::post('/home/delete',[HomeController::class,'delete'])->name('deleteAccount');

// pour l'admin connecté 
Route::get('/admin-moncompte/monCompte',[HomeController::class,'moncompte'])->name('monCompte') ;

Route::group(['namespace' => 'Auth'], function() { 
    Route::get('register',[RegisterController::class,'create'])->name('register');
    Route::post('register',[RegisterController::class ,'store']) ;
    Route::put('register/{register}',[RegisterController::class, 'update'])->name('register.update');
    Route::get('register/{register}/edit',[RegisterController::class, 'edit'])->name('register.edit') ;
    Route::get('login', [LoginController::class,'create'])->name('login') ; 
    Route::post('login', [LoginController::class,'store']) ; 
    Route::get('logout', [loginController::class,'logout'])->name('logout') ;
     
});

// Recupere mon compte 
Route::get('recover',[ContactController::class , 'recover'])->name('recover.account');
Route::post('recover',[ContactController::class , 'recoveraccount'])->name('recover.myaccount');

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

Route::delete('users-delete',[UserController::class,'deleteimages'])->name('users-image.delete');
Route::post('/users-comment',[UserController::class,'comments'])->name('users-comment.save');
Route::get('/home/user-message',[UserController::class,'messages'])->name('messages') ;

// gestion des associations avec resource 

Route::resource('admin-asso',AssociationController::class)->parameters([
    'admin-asso' => 'association'
]); 



//evenements des associations 


Route::get('/admin-evenement/{association}',[AssociationController::class , 'eventindex'])->name('evenement.show');

Route::get('/admin-asso/create/{association}/bureau',[BureauController::class,'create'])->name('create.bureau');
// j'ai ajouté {association} voir la vue bureau/create; avant d'aller au controller on passe par ici d'abord
// la raison est simple , je veux une fois créer le membre du bureau revenir a la view show , pour cela je dois avoir l'association
Route::post('/admin-asso/{association}/store/bureau',[BureauController::class,'store'])->name('store.bureau');
Route::delete('/admin-asso/delete/{bureau}',[BureauController::class,'delete'])->name('delete.bureau') ; 

Route::get('/admin-asso/MembreBureau/id/{bureau}/edit',[BureauController::class,'edit'])->name('edit.bureau') ;
Route::put('/admin-asso/update/{bureau}',[BureauController::class, 'update'])->name('update.bureau') ; 

//'search' pour la recherche des utilisateur 
Route::get('/user/Search',[AssociationController::class,'search'])->name('admin.userSearch') ; 

// pour les likes et les particpes 
Route::post('evenement/participes',[BureauController::class,'participe'])->name('participe');
Route::delete('evenement/participes/delete',[BureauController::class,'deleteParticipe'])->name('deleteParticipe');

Route::post('evenement/like',[BureauController::class , 'like'])->name('like');
Route::delete('evenement/like/delete',[BureauController::class , 'deleteLike'])->name('deleteLike');



// pour les suivis des associations 
Route::get('/admin-asso/association/{association}',[BureauController::class,'userindex'])->name('user.association') ; 
Route::post('association/{association}/suivis',[BureauController::class , 'suivisUser'])->name('suivis.attach');
Route::delete('association/suivis/{association}',[BureauController::class , 'suivisDelete'])->name('suivis.delete');

Route::post('/admin-asso/membreCreate',[BureauController::class,'membreCreate'])->name('admin-asso.membre_create') ; 
Route::delete('/admin-asso/membreDestroy/{user}',[BureauController::class,'membreDestroy'])->name('admin-asso.membre_destroy') ;

// pour les évènements 

Route::post('/admin-asso/evenements' ,[AssociationController::class , 'eventStore'])->name('adminevent.store') ; 
Route::put('admin-asso/evenement/update/{evenement}',[AssociationController::class , 'eventUpdate'])->name('update.evenement');
Route::delete('/admin-asso/evenement/delete/{evenement}',[AssociationController::class,'eventDelete'])->name('delete.event');


//pour le contact

Route::get('contact',[ContactController::class,'indexContact'])->name('contact.index');
Route::post('contact/invite/message/admin',[ContactController::class,'guestContact'])->name('guest.contact');
Route::post('contact/utilisateur/message/admin',[ContactController::class,'authContact'])->name('auth.contact');

Route::get('admin/contact/generale',[ContactController::class,'admincontact'])->name('admin.contact');
Route::delete('admin/contact/delete',[ContactController::class,'contactdelete'])->name('contactuser.delete');

// user reponse 

Route::get('home/message/admin/reponse',[HomeController::class , 'reponseadmin'])->name('reponse') ;

// admin répond aux message 
Route::post('message/admin/reponse',[ContactController::class , 'reponse'])->name('reponse.admin') ;

Route::post('commentaire/suppression',[ContactController::class, 'commentaires'])->name('commentaire') ; 

Route::delete('supprimer/commentaire/user',[ContactController::class, 'delete_comment'])->name('delete-comment') ;
Route::put('editer/commentaire/user',[ContactController::class, 'edit_comment'])->name('edit-comment') ;


//quand on deux foreach et que l'on veut afficher tout les information de la variable qui est dans le foreach dependament du 2eme foreach . alors on met tout les variables dans le 2eme foreach

/* <!--  Quand on a deux foreach et que on veut afficher tous les informations dependement
                    de deuxieme foreach alors on mets tous les variables dans le deuxieme foreach
                -->
                @foreach($users as $user)
                <tr>
                    <!-- qui devrait etre ici -->
                    @foreach ($user->postes as $poste)
                    <td>{{ $user->name }}</td> <!-- exemple ici -->
                      <td>{{ $poste->id}}</td>
    */      


    //Notification 
Route::put('notification_message',[AssociationController::class,'notifMessage'])->name('notification_message');


















