<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule ; 

class UserController extends Controller
{
    public function index() { 

    $users = User::where('role','<>','admin')->get() ; 
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
            ]); 
           
            $user->update($request->all()) ; 

            return view('users.admin.index')->with('admin','Les modifications on été effectués avec succès ! ')  ; 
    }  

    public function destroy(User $user) { 
       
       
         $user->delete() ; 

         return view('users.admin.index')->with('admin','L\'utilisateur a été supprimer avec succès ! ') ;
    }
}
