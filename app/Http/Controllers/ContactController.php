<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use App\Models\Association;
use App\Models\Comment;
use App\Models\Commentaire;
use App\Models\Evenement;
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

   public function deletecommentaire(Request $request) {
    
          $comment = Commentaire::where('id',$request->id)->first() ; 
           
          $comment->delete() ; 

          return back()->with('commentdelete' , 'Le commentaire est supprimé avec succès ') ; 
   }

    public function commentaires(Request $request) { 

       $request->validate([
           'commentaire' => 'required' ,
       ]);

      
        Commentaire::create([
            'user_id' => $request->user_id , 
            'association_id' =>$request->association_id  , 
            'commentaire' => $request->commentaire
        ]);

        return back()->with('comment', 'votre commentarire a été envoyé avec succès ' ) ; 
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
        
        return redirect()->route('home')->with('contact',' votre message a été envoyé avec succès ! ')  ; 
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
     $user_contacts = Usercontact::where('supprimer',0)->get() ;
     $notification = UserContact::where('status', 0)->get() ; 
     $count_message = Usercontact::count() ;
     $commentaires = Commentaire::all() ; 
       // 500 | SERVER ERROR car j'avais écrit 'comment'
    
   
    return view('contact.admin.index',compact('associations','user_contacts','count_message','notification', 'commentaires')) ;
    
    }

    public function admincommentaire() {

     $associations = Association::all() ;
     $user_contacts = Usercontact::where('supprimer',0)->get() ; 
     $notification = UserContact::where('status', 0)->get() ; 
     $count_message = Usercontact::count() ;
     $commentaires = Commentaire::all() ; 
     

        return view('contact.admin.commentaire',compact('associations','user_contacts','count_message','notification', 'commentaires')) ; 
    }

        public function dashboard() { 
            
            
            // les valeurs comptés 
            $asso = Association::all()->count() ;
            $event = Evenement::all()->count() ;  
            $use = User::all()->count() ; 
            $comment = Commentaire::all()->count() ; 
            $messa = Usercontact::all()->count() ; 
            
         $associations = Association::all() ;
         $user_contacts = Usercontact::where('supprimer',0)->get() ; 
         $notification = UserContact::where('status', 0)->get() ; 
         $count_message = Usercontact::count() ;
         $commentaires = Commentaire::all() ; 
         $users = User::where('id','<>',auth()->user()->id)->paginate(5) ; 
         $evenements = Evenement::take(7)->get() ; 
       return view('admins.dashboard.home',compact('associations','user_contacts','count_message','notification', 'commentaires','users','evenements','asso','event','use','comment','messa')) ; 

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
        
        $user = Usercontact::where('id',$request->message_id)->first() ; 
        $user->supprimer = 1 ; 
        $user->save() ; 
        return back()->with('usermessage','message supprimer avec succès ! ') ; 
    }

    public function contactread(Request $request) 
     { 
        $user = UserContact::where('id',$request->message_id)->first() ; 
        $user->status = 1 ; 
        $user->save()  ; 
        return back()->with('userread','Le message a été bien lu ')  ; 
     }

    public function reponse(Request $request) { 

        
        Reponse::create([
            'usercontact_id'=> $request->contact, 
            'user_id'=> $request->user_id, 
            'message'=> $request->message, 
        ]);

       
        //PAS BESOIN DE FOREACH CAR JE SUIS DANS UNE MESSAGE DÉJÀ 
        //juste ajouter les lignes de notification , ici c'est 'post' pas 'put' methode 
     
        // le 2eme where pour mettre la colonne status à  1 du bon message 
        //le problème que j'ai eu avec les 2premier where , c'est que si la personne avait envoyé 2 message et que je reponds 2fois il decrémenté même si je suis dans le meme message 
        $notification = Usercontact::where('status',0)->where('user_id',$request->user_id)->where('id',$request->contact)->first() ; 

        if($notification){ // sans cette condition il y'aurait des erreurs ; si existe alors on change sinon on fait rien ; 

             //pas de boucle 
         $notification->status = 1 ; 
         $notification->save() ; 

        }
       
        
 
      
        return back()->with('reponse-send','Message envoyé avec succès ') ; 

     
    }

     public function delete_comment(Request $request) { 

   
       $messages =  Commentaire::where('id',$request->message_id)->first() ; 

        $messages->delete() ;

       
        return back()->with('deleted','message supprimé avec succès') ; 
    }
        public function edit_comment(Request $request) { 

   
       $messages =  Commentaire::where('id',$request->id) ; 

       
        $messages->update([
            'user_id' => $request->user_id , 
            'association_id' => $request->association_id , 
            'commentaire' => $request->commentaire 
        ]) ;

        

       
        return back()->with('edit','message supprimé avec succès') ; 
    }
}
