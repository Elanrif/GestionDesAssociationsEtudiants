<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Association;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

     public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function create() { 

      $associations = Association::all() ;
        return view('users.auth.login',compact('associations')) ; 
    }

    public function store(Request $request) // la personne va être connecté 
    { 

        // si l'email de l'utilisateur pris par request est égale a email d'un utilisatuer en base de donnée on prend le premier : et puisque les email unique donc c'est bien lui 
    $user = User::where('email',request('email'))->first() ;
        
    if($user){ 
      if(request('password') == $user->password){ //verifie si le mot de passe pris est == aux mot de passe de l'utilisateur avec l\'email saisie

        if($user->active == 1 && $user->role == 'admin' ) { // admin

            Auth::login($user)  ;
            $request->session()->regenerate();  // regenere la session()
          
          return redirect()->route('monCompte')->with('login',' Bienvenu dans votre page utilisateur '); 
        }
        elseif($user->active == 1 && $user->role == 'utilisateur') {// si c'est un simple utilisateur 

            Auth::login($user)  ;
            $request->session()->regenerate();  // regenere la session()

          return redirect()->route('home')->with('login',' Bienvenu dans votre page utilisateur '); 

        }
        else // sinon 
        return redirect()->route('login')->with('danger','Ce compte a été supprimer définitivement') ;
         
      }
      return back()->with('danger','Ces informations d\'identification ne corresponds pas à nos enregistrements') ; 
    }
      
        return back()->with('danger','Ces informations d\'identification ne correspondent pas à nos enregistrements.') ;
    }

    public function logout(Request $request) { 

        auth()->logout() ; 
        
        $request->session()->invalidate();

        return redirect()->route('login')->with('logout','Veuillez vous connecter à votre compte pour avoir accès aux dernières mises à jour. ! '); 
    }
}
