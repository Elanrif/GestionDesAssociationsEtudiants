<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Association;
use App\Models\Reponse;
use App\Models\Usercontact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    public function __construct() { 

        $this->middleware('auth') ; 
    }

    public function index() { 
        
       $associations = Association::all() ;
       $reponses = Reponse::where('user_id',auth()->user()->id)->count() ; 
        return view('users.auth.user.home',compact('associations','reponses')) ; 
    }

    public function reponseadmin() { 

        // je pourrais faire find , mais puisque je veux utiliser @foreach passer direcement get() pour recuperer la collection
     $user_contacts = Usercontact::where('user_id',auth()->user()->id)->get() ; 
    
     //admin pour recuperer sa photo 

     $admin = User::where('role','admin')->first() ; 
     $count_message = Usercontact::count() ;
   
      $associations = Association::all() ;
        return view('users.auth.user.reponse',compact('associations','user_contacts','count_message','admin')) ; 
     
    }

    public function compte() 
    { 
        $associations = Association::all() ;

        return view('users.auth.admin.adminHome',compact('associations')) ; 
    }

    public function moncompte() 
     { 
         $associations = Association::all() ; 
        $count_message =  Usercontact::count() ;
         return view('users.auth.admin.admincompte',['associations'=>$associations,'count_message'=>$count_message]) ;
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

     public function delete() { 

        
        // je prends la personne connecté et je met le role au booléan 0 pour désactiver son compte 
        $user = User::find(auth()->user()->id); 
        $user->active = 0 ;
        $user->save() ;
        // je le déconnecte
        auth()->logout() ; 

        $associations = Association::all() ; 
        
        return back() ;
     }
}

