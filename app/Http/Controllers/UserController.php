<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule ; 
use App\Http\Controllers\Controller;
use App\Models\Association;
use App\Models\Comment;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller  // dans le parent on doit avoir les mêmes variables qui seront utilisé dans les controller
{
// le controller qui va être herité si il y'a une variable a ce controller alors tous ces enfants doivent obligatoirement herité de cette variable ('principe de l\'heritage') ; 
    public function index() { 

        // Gate::authorize('admin-user') ;  directement rediriger vers le abort en cas d'erreur 
    if(!Gate::allows('admin-user')){  // si la personne ne réponds pas au gate alors on va pas faire abort(403) ; sachant que le reste c'est  'ELSE '

        return abort(403);
    }

    // $associations = Association::all() ; 
    $users = User::where('id','<>',auth()->user()->id)->orderBy('nom')->get(); // tout les utilisateur sauf la personne connecté . à savoir que auth()->user() est dans dèja configurer dans la session
    $associations = Association::all() ; 
    return view('users.admin.index',compact(['users','associations'])) ;

    }

    public function edit(User $user) { 

        Gate::authorize('admin-user');
         $associations = Association::all() ; 
        return view('users.admin.edit',compact(['user','associations'])) ; 
    }

    public function update(Request $request, User $user) { 

          Gate::authorize('admin-user') ; // directement il va faire le !allows et après faire le allows pour le reste du code car c'est comme else { ....reste du code ....}

           $request->validate([

            'nom' => ['required', 'string','min:3','max:255'],
            'prenom'=>['required', 'string' ,'min:3', 'max:255'],
            'email' => ['required', 'string', 'email','min:13','max:255',Rule::unique('users')->ignore($user->id)],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'num_tel' => ['required','numeric', Rule::unique('users')->ignore($user->id),'digits:10'],
            'code_apogée'=>['required','numeric',Rule::unique('users')->ignore($user->id),'digits:8'],
            'filiere' =>['required','string'],
            'role'=>['required'],
            'active'=>['required'],
            ]); 
           
            $user->update($request->all()) ; 

            return redirect()->route('admin-users')->with('update','Les modifications on été effectuées avec succès ! ')  ; // dans destroy ,update , store il faut toujours redirigé vers une route ; sinon tu auras une erreur que la variable n'existe pas si tu veux dirigé dans le view ce qui est normale car tu l'a déjà supprimé/modifier et il n'existe pas encore etc.....
    }  


    // l'image d'un utisateur 
    public function images(Request $request){ 

        // pour sauvegarder l'image dans le storage 
    
          $filename = time() . '.' . $request->image->extension() ;

        $path = $request->image->storeAs(
            'users-image',
            $filename,
            'public',
        );
 
       $user = User::find(auth()->user()->id); // Permet de trouver directement l'utilisateur avec le même id que la personne authentifié 
       
             // yá plusieur façon de faire bien sur 
             // ici puisque je veux seulement recuperer la photo ben les autres champs je vais les modifier par les données de la personne déja connecté 
         
           $user->image = $path ;  // LA METHODE SAVE PERMET DE MODIFIER DIRECTEMENT CE QUE L'ONT VEUT SANS TENIR COMPTE DES AUTRES 
        
           $user->save() ;
            return redirect()->home()->with('image','L\'image a été modifier avec succès'); 
    }

    public function comments(Request $request)//pour la personne connectés
    {
        // save # create ! 

       $user = User::find(auth()->user()->id) ;
       // $user->comment  comment est la relation du hasOne ... 
       $user->comment = new Comment ;  //j'instancie un enregistrement pour les commentraires de l'utilisateur connecté
       // si je n'instancie pas il va écraser la 1er valeur enregistrer 
       $user->comment->commentaire = $request->commentaire ; 
       $user->comment->user_id  = auth()->user()->id ; // aussi n'oublie pas de mettre le Id de la personne connecté 
       $user->comment->save()  ; // je sauvegarde les commentaire en passant par la rélation
       return back()->with('comment',' Votre message a été envoyé avec succès  ! ') ; 
       

    }

    public function messages() { 

        $user = user::find(auth()->user()->id) ; 
        $comments =  $user->comment::all(); // ici all() ou get() ça revient au même 
       
        return view('users.auth.message',['comments'=> $comments]) ;
    }

    public function destroy(User $user) { 
       
       Gate::authorize('admin-user') ; 

         $user->delete() ; 

         return redirect()->route('admin-users')->with('delete','L\'utilisateur a été supprimer avec succès ! ') ;//ne jamais faire directement view(..) car on aura une erreur . donc il faut toujours redirigé pour echapper ça 
    }

 
}
