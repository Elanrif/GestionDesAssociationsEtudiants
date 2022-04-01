<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule ; 


class UserController extends Controller
{
    public function index() { 

    $users = User::where('id','<>',auth()->user()->id)->get() ; // tout les utilisateur sauf la personne connecté . à savoir que auth()->user() est dans dèja configurer dans la session
    return view('users.admin.index',compact('users')) ;

    }

    public function edit(User $user) { 

        return view('users.admin.edit',compact('user')) ; 
    }

    public function update(Request $request, User $user) { 

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
           $user->nom = auth()->user()->nom ; 
           $user->prenom = auth()->user()->prenom ; 
           $user->email = auth()->user()->email ; 
           $user->password = auth()->user()->password ; 
           $user->num_tel = auth()->user()->num_tel ; 
           $user->code_apogée = auth()->user()->code_apogée ; 
           $user->filiere = auth()->user()->filiere ; 
           $user->image = $path ; 
        
           $user->save() ;
            return redirect()->home()->with('image','L\'image a été modifier avec succès'); 
    }

    public function destroy(User $user) { 
       
       
         $user->delete() ; 

         return redirect()->route('admin-users')->with('delete','L\'utilisateur a été supprimer avec succès ! ') ;//ne jamais faire directement view(..) car on aura une erreur . donc il faut toujours redirigé pour echapper ça 
    }
}
