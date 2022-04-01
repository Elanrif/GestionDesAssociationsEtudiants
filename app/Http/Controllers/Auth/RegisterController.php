<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{

     public function __construct()
    {
        $this->middleware('guest')->except(['edit','update']);
    }

    public function create() { 
 
        return view('users.auth.register') ; 
    }

    public function store(Request $request) { 

            $request->validate([

            'nom' => ['required', 'string','min:3','max:255'],
            'prenom'=>['required', 'string' ,'min:3', 'max:255'],
            'email' => ['required', 'string', 'email','min:13','max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'num_tel' => ['required','numeric','unique:users','digits:10'],
            'code_apogée'=>['required','numeric','unique:users','digits:8'],
            'filiere' =>['required','string'],
            ]);

           $user =  User::create([
               'nom'=>$request->nom,
               'prenom'=>$request->prenom,
               'email'=>$request->email,
               'password'=>$request->password,
               'num_tel'=>$request->num_tel,
               'code_apogée'=>$request->code_apogée,
               'filiere'=>$request->filiere,
           ]) ; 
            auth()->login($user) ; 

            return redirect()->route('home')->with('register','Votre compte a été crée avec succès !') ;
    }

    
    public function edit(User $user){ 

        return view('users.auth.edit',compact('user'));
    }

    public function update(Request $request) { 
        
           $request->validate([

            'nom' => ['required', 'string','min:3','max:255'],
            'prenom'=>['required', 'string' ,'min:3', 'max:255'],
            'email' => ['required', 'string', 'email','min:13','max:255',Rule::unique('users')->ignore(auth()->user())],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'num_tel' => ['required','numeric', Rule::unique('users')->ignore(auth()->user()),'digits:10'],
            'code_apogée'=>['required','numeric',Rule::unique('users')->ignore(auth()->user()),'digits:8'],
            'filiere' =>['required','string'],
            ]);
            $user = User::find(auth()->user()->id); // Permet de trouver directement l'utilisateur avec le même id que la personne authentifié 
             
           $user->nom = $request->nom ; 
           $user->prenom = $request->prenom ; 
           $user->email = $request->email ; 
           $user->password = $request->password ; 
           $user->num_tel = $request->num_tel ; 
           $user->code_apogée = $request->code_apogée ; 
           $user->filiere = $request->filiere ; 
           $user->save() ; // qui va chercher la personne avec le même id est l'enregister voir le modifier
         
            return redirect()->route('home')->with('update',' Vos informations ont été modifié avec succès ! ') ;  ;

    }
}
