<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    public function __construct() { 

        $this->middleware('auth') ; 
    }

    public function index() { 
 
       
        return view('users.auth.user.home') ; 
    }
    public function compte() 
    { 
        $associations = Association::all() ;

        return view('users.auth.admin.adminHome',compact('associations')) ; 
    }

    public function moncompte() 
     { 
         $associations = Association::all() ; 

         return view('users.auth.admin.admincompte',['associations'=>$associations]) ;
     }

     public function general() 
     { 
          $associations = Association::all() ; 

         return view('users.auth.user.general',compact('associations')) ; 
     }

     public function edit() { 

          $associations = Association::all() ; 
          return view('users.auth.user.edit',compact('associations')) ;
     }

     public function password() { 

          $associations = Association::all() ; 
          return view('users.auth.user.password',compact('associations')) ;
     }

     public function UpdateGeneral(Request $request) 
     { 
          $request->validate([

            'nom' => ['required', 'string','min:3','max:255'],
            'email' => ['required','email', 'string', 'email','min:13','max:255',Rule::unique('users')->ignore(auth()->user())],
            
            ]);

            
            $user = User::find(auth()->user()->id); // Permet de trouver directement l'utilisateur avec le même id que la personne authentifié 
             
           $user->nom = $request->nom ; 
           $user->email = $request->email ; 
           $user->save() ; // qui va chercher la personne avec le même id est l'enregister voir le modifier
         

         $associations = Association::all() ;

         return back()->with('general','Modifiaction effectué avec succès ! ') ; 
     }

     public function UpdatePassword(Request $request) { 

           $request->validate([

              'password' => ['required', 'string', 'min:8'],
              'nouveau'=>['required','min:8']
            ]);

        $user = User::find(auth()->user()->id);

        if($user->password == $request->password) {// si le mot de passe de l'utilisateur est == a l'ancien saisir par l'user alors on modifie

        $user->password = $request->nouveau ; 
        $user->save() ;

        return back()->with('success','mot de passe modifier avec succes ! ') ; 
        }
        else { 
    
            return back()->with('erreur','votre ancien mot de passe est incorrect');
        }
     }

      public function showdelete()
     {
         $associations  = Association::all() ; 

         return view('users.auth.user.delete',compact('associations')) ;
     }
}

