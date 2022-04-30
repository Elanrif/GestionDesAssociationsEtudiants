<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Association;
use App\Models\User;
use App\Models\Usercontact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; // doit être importer pour la redirection

class ContactController extends Controller
{
    
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

    public function contactdelete(Request $request) 
    { 
        // j'utilise le meme systeme , je passe un input dans le formulaire ou je recupere l'enregistrement id et je le cahche ensuite par visually-hidden
        $user = Usercontact::where('id',$request->message_id) ; 
        $user->delete() ;
        return back()->with('usermessage','message supprimer avec succès ! ') ; 
    }
}
