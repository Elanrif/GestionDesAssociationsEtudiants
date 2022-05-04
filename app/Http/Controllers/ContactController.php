<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use App\Models\Association;
use App\Models\Reponse;
use App\Models\Usercontact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect; // doit être importer pour la redirection

class ContactController extends Controller
{
    
 
    public function recover() 
    { 
        
      $associations = Association::all() ; 
      return view('users.auth.user.recover',['associations'=>$associations]);

    }

    //juste pas besoin de créer un autre table , je verfie juste si les donnés envoyé corresponds bien a celle de la table 
    public function recoveraccount(Request $request) 
    {   
        $request->validate([
            'email'=> ['required','email'],
            'num_tel' => 'required'
        ]);

        
        $user = User::where('email',$request->email)->where('num_tel',$request->num_tel)->first() ;
         if($user){ //si c'est bien lui je le connecte et je le renvoie dans la view 

            //si je le connecte pas avant de le rediriger il ne va pas marcher . 
            // car dans la view home on doit etre Auth::login 
              Auth::login($user)  ;
            $request->session()->regenerate();  // regenere la session()
        
        return Redirect::to('home')->with('recover','Bienvenu dans votre compte') ;

         }
         else { //sinon je lui renvoie des erreur 

            return back()->with('error','Aucun résultat de recherche');
         }

        
    }

     public function indexContact()
    {
     
     $associations = Association::all() ; 
     
    return view('contact.index',['associations'=>$associations]) ;
}

    public function authContact(Request $request) //personne authentifié envoie le message
    { 
        $request->validate([
            'message'=>'required' ,
        ]) ; 

        Usercontact::create($request->all()) ; 
        
        return redirect()->route('home')  ; 
    }

     public function guestContact(Request $request) //personne invité du site envoie le message
    { 
        // exists() return true si il recupere email = $request->email et password ; 
      $exists =  User::where('email',$request->email)->where('password',$request->password)->exists() ; 
        
        $request->validate([
            'nom'=>'required',
            'num_tel'=>'required',
            'email'=>['required','email'],
            'message'=>'required',
        ]);
 
        Contact::create($request->all()) ; 
        // ou bien redirect()->to('url) ; 'r' miniscule 
        // Redirect::to('url) ; 'R' majuscule , la ::to methode accepte que les URL  
        return Redirect::to('/') ; 
    }


    // admin gere les contact 
    public function admincontact() { 

     $associations = Association::all() ;
 
     $user_contacts = Usercontact::all() ; 

     $count_message = Usercontact::count() ;
     
    
    
    return view('contact.admin.index',compact('associations','user_contacts','count_message')) ;
    
    
    }
    // supprimer mon contact admin 
    public function admindelete(Usercontact $contact) { 

        dd() ; 
        $contact->delete() ; 

        return back() ; 
    }

    public function contactdelete(Request $request) 
    { 
        // j'utilise le meme systeme , je passe un input dans le formulaire ou je recupere l'enregistrement id et je le cahche ensuite par visually-hidden
        $user = Usercontact::where('id',$request->message_id) ; 
        $user->delete() ;
        return back()->with('usermessage','message supprimer avec succès ! ') ; 
    }

    public function reponse(Request $request) { 

        
        Reponse::create([
            'usercontact_id'=> $request->contact, 
            'user_id'=> $request->user_id, 
            'message'=> $request->message, 
        ]);

      
        return back() ; 

     
    }
}
