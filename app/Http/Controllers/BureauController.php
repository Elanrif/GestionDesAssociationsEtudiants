<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use App\Models\Bureau;
use App\Models\Membre;
use App\Models\Evenement;
use App\Models\Participe;
use App\Models\Association;
use App\Models\Usercontact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class BureauController extends Controller
{
    // pour créer les membres du bureau de l'association;mais je passe directement l'association comme parametre puisque dans le show view avant de venir ici je connais déjà l'association 
    public function create(Association $association){ 

       
       $associations = Association::all() ; 
        return view('associations.bureau.create',compact(['association','associations'])) ; 
    }

  


    public function store(Request $request , Association $association)  { 

        
        $request->validate([
            "nom"=>['required','string'] ,
            "prenom"=>['required','string'],
            "email"=>['required','email'],
            "filiere"=>['required','string'] , 
            "date_mandat"=>['required','date'], 
            "Poste"=>['required','string'], 
            "Tel"=>['required','numeric'], 
            "association_id"=>['required']
        ]);
        
        $path = Storage::disk('public')->put('bureaus_image',$request->image) ; 
         

        $association->bureaus = new Bureau() ; // une nouvelle ligne('enregistrement') vierge

        $association->bureaus->nom = $request->nom ; 
        $association->bureaus->prenom = $request->prenom ; 
        $association->bureaus->date_mandat = $request->date_mandat; 
        $association->bureaus->Poste = $request->Poste ; 
        $association->bureaus->Tel = $request->Tel; 
        $association->bureaus->email = $request->email; 
        $association->bureaus->filiere = $request->filiere ; 
        $association->bureaus->image = $path ; 
        $association->bureaus->association_id = $request->association_id ; 

        $association->bureaus->save() ; 
         // je dois utiliser la methode Redirect::to car la methode back() ne permet pas d'envoyer au délà de 1onglets 
         // puisque moi je veux la 2eme onglets ayant été fermer donc Redirect::to , aussi je concatène avec l'association sinon il ne marche pas 
         return Redirect::to('admin-asso/' .$association->id)->with('create','votre requête est effectué avec succès!') ; 
    }

    // j'ai ajouté $association pour pouvoir dans le update avoir accès a cette variable pour pouvoir retourner dans la view show association 
    public function edit(Bureau $bureau)
    { 
    
        
        // $associations avec 's' car leur parent la barre verticale noire utilise la variable $associations donc tout ses enfants doivent herité de cette variable 
        $associations = Association::all() ; 
     
        return view("associations.bureau.edit",compact(['bureau','associations'])) ; 

    }
    
    public function update(Request $request ,Bureau $bureau) 
    { 
         $request->validate([
            "nom"=>['required','string'] ,
            "prenom"=>['required','string'],
            "email"=>['required','email'],
            "filiere"=>['required','string'] , 
            "date_mandat"=>['required','date'], 
            "Poste"=>['required','string'], 
            "Tel"=>['required','numeric'], 
            "association_id"=>['required']
        ]);
        
         $path  = Storage::disk('public')->put('bureaus_image',$request->image) ; 
         
               $bureau->nom = $request->nom ; 
               $bureau->prenom = $request->prenom ; 
               $bureau->date_mandat = $request->date_mandat; 
               $bureau->Poste = $request->Poste ; 
               $bureau->Tel = $request->Tel; 
               $bureau->email = $request->email; 
               $bureau->filiere = $request->filiere ; 

               if($request->image == null ){

                   $bureau->image = $bureau->image ; 
                    $bureau->association_id = $bureau->association_id ;  // je dois prendre le même id car je ne peux pas mettre $request->association_id car c'est une clé etranger donc il reste le même 

               $bureau->save() ;
            
         // $associations = Association::all() ;
       // $users = User::all() ; 
        return  redirect()->back()->with('edit','Modification effectuée avec succès '); ; 
        
               }

               // else 
               $bureau->image = $path ; 
               $bureau->association_id = $bureau->association_id ;  // je dois prendre le même id car je ne peux pas mettre $request->association_id car c'est une clé etranger donc il reste le même 

               $bureau->save() ;
            
         // $associations = Association::all() ;
       // $users = User::all() ; 
        return  redirect()->back()->with('edit','Modification effectuée avec succès '); ; 
        
    }
    public function delete(Bureau $bureau) { 

        $bureau->delete() ; 

        return back()->with('delete','la personne a été supprimer parmi les membres du Bureau !');
    }

    // pour l'user qui va voir les asso 

    public function userindex(Association $association , Bureau $bureau) { 

        $associations = Association::all() ; 
        return view('associations.user.index',compact(['association','bureau','associations'])) ;
    }
 //pour créer un membre du bureau 

    public function membreCreate(Request $request){ 

          $request->validate([

              'user_id'=>['required'],

          ]) ; 

          Membre::create($request->all()) ; 

          return back()->with('manarfatiguer','Vous avez bien ajouté un membre avec succès !') ; 

    }

    public function suivisUser(Request $request,Association $association){ 

       
        Membre::create($request->all()); 
        $membre = Membre::all() ; 
        return back()->with('suivis','Vous suivez maintenant cette Association .');
    }

  

    public function membreDestroy(Request $request , User $user) // pour supprimer un membre l'admin
    {  
   
        // contrairement a ligne 134 moi je prends ici les données par $request via un formulaire ou bien les passer a travers la route puis directement le recuperer sans $request d'ailleur c'est ce que j'ai fait a la ligne 134
        //  $user->associations()->detach($user->id) ; 
        $membre = Membre::where('user_id',$request->user_id)->Where('association_id',$request->association_id)->first() ;    
        $membre->delete() ; 
        return back()->with('manar','suppression Réussi ! ') ;
    }

    public function suivisDelete(Association $association)// pour la personne connecté ; bien sûr un peu de modifcation 
    { 
        // je verifie si la personne connecté et l'association actuelle sont dans la migration membres
        // si vrai je le supprime
        $membre = Membre::where('user_id',auth()->user()->id)->Where('association_id',$association->id)->first() ;    
        $membre->delete() ; 
        return back()->with('suivisDelete','vous ne suivez plus l\'association ! ') ;
    }

    // pour les likes et les participes des utilisateurs connecté 

    public function participe(Request $request) 
     { 
        
       Participe::create($request->all()) ; 
    
      return back()->with('participer','Vous participez maintenant à cet évènement')   ; 
     }

     public function deleteParticipe(Request $request)
     { 

         $participe = Participe::where('user_id',$request->user_id)
         ->where('evenement_id',$request->evenement_id) ; 

         $participe->delete() ; 
      
         return back()->with('deleteparticiper','Vous ne particpez plus à cet évènement') ; 
     }

     public function like(Request $request)
     { 
         Like::create($request->all()) ; 
         return back()->with('liker','j\'aime') ; 
     }

     public function deleteLike(Request $request)
     { 
         $like = Like::where('user_id',$request->user_id)
         ->where('evenement_id',$request->evenement_id) ;

         $like->delete() ; 

         return back()->with('deletelike','je n\'aime plus') ; 
     }
}
