<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

            return redirect()->route('admin-users')->with('admin','Les modifications on été effectués avec succès ! ')  ; // dans destroy ,update , store il faut toujours redirigé vers une route ; sinon tu auras une erreur que la variable n'existe pas si tu veux dirigé dans le view ce qui est normale car tu l'a déjà supprimé/modifier et il n'existe pas encore etc.....
    }  

    public function destroy(User $user) { 
       
       
         $user->delete() ; 

         return redirect()->route('admin-users')->with('admin','L\'utilisateur a été supprimer avec succès ! ') ;//ne jamais faire directement view(..) car on aura une erreur . donc il faut toujours redirigé pour echapper ça 
    }
}
