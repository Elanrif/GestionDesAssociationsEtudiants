<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Evenement;
use App\Models\Association;
use App\Models\Commentaire;
use App\Models\Usercontact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class AssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         Gate::authorize('admin-user');
         
         $notification =  UserContact::where('status', 0)->get() ;;
        $associations = Association::latest()->get() ; 
        $count_message =  Usercontact::count() ;
        $commentaires = Commentaire::all() ; 
        return view('associations.admin.index', compact('commentaires','associations','count_message','notification'));
    }

    public function dashboardevent() { 

        Gate::authorize('admin-user') ; 
             
         $notification =  UserContact::where('status', 0)->get() ;;
        $associations = Association::latest()->get() ; 
        $count_message =  Usercontact::count() ;
        $commentaires = Commentaire::all() ;
        $evenements = Evenement::all() ;  
        return view('associations.admin.dashboard', compact('commentaires','associations','count_message','notification','evenements'));

    }

    
      public function notifMessage(){ 

        $state = Usercontact::where('status',0)->get()  ;
        
        // il suffit juste d'entrer a la table et pour chaque Usercontact = 0 je le change en 1 ; 
        foreach($state as $states){

             $states->update([
            'status'=>1 , 
        ]);
        }
       
       return back()->with('notification','Tous les messages ont été lu avec succès ') ; 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         Gate::authorize('admin-user');
        $associations = Association::all() ;
        $count_message =  Usercontact::count() ;
         $notification = UserContact::where('status', 0)->get() ; 
         $commentaires = Commentaire::all() ; 
        return view('associations.admin.create',['notification'=>$notification,'associations'=>$associations ,'count_message' =>$count_message,'commentaires'=> $commentaires]) ; 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         Gate::authorize('admin-user');

        $request->validate([
            'nom' => 'required',
            'date' => 'required',
            'description' =>'required',
            'image' =>'required'
           
        ]);

        // $path = Storage::disk('public')->put('asso-image', $request->image);
       $filename = time() . '.' . $request->image->extension() ; ; 
        $path = $request->file('image')->storeAs(
    'asso-image', $filename,'public'
             );

      
       $associa = Association::create([
            'nom' => $request->nom,
            'date'  => $request->date,
            'description' => $request->description,
            'image' => $path 
        ]) ; 

        

        return redirect()->route('admin-asso.index')->with('associations','Vous avez créer une nouvelle association ! ') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Association  $association
     * @return \Illuminate\Http\Response
     */
    public function show(Association $association)
    {
        $associations = Association::all() ;
        $users = User::all() ; 
        $count_message =  Usercontact::count() ;
        $notification = UserContact::where('status', 0)->get() ; 
        $commentaires = Commentaire::all() ; 
        return view('associations.admin.show',compact(['notification','commentaires','association','associations','users','count_message'])) ; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Association  $association
     * @return \Illuminate\Http\Response
     */
    public function edit(Association $association)
    {
        $associations = Association::all() ;
         Gate::authorize('admin-user');
        $count_message =  Usercontact::count() ;
        $notification = UserContact::where('status', 0)->get() ; 
        $commentaires = Commentaire::all() ; 
        return view('associations.admin.edit',compact(['notification','commentaires','association','associations','count_message'])); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Association  $association
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Association $association)
    {
       
         Gate::authorize('admin-user');

        if($request->image == null){ // si on ne renvoie pas d'image je vais faire le save avec l'image par défaut e
        //je recupère déja l'association dans le lien de blade même dans cette methode je l'es en parametre donc pas besoin de faire un__ Association::where('id',$association->id)  ;
                $request->validate([
            'nom' => 'required',
            'date' => 'required',
            'description' =>'required',
            
             ]);
            
                $association->nom = $request->nom  ;
                $association->description = $request->description ;
                $association->date = $request->date ;
                $association->image = 'asso-image/1649237981.jpg'  ; // je mets l'image par défaut

                $association->save() ; 
             
            return redirect()->route('admin-asso.index')->with('update','L\'association a été modifié avec succès !');
        }
       // else 
       else { 

          $request->validate([
            'nom' => 'required',
            'date' => 'required',
            'description' =>'required',
            'image' =>'required'
           
        ]);
    
        //par défaut:  $path = Storage::disk('public')->put('asso-image', $request->image);

            // $path = Storage::disk('public')->put('asso-image', $request->image);
       $filename = time() . '.' . $request->image->extension() ; ; 
        $path = $request->file('image')->storeAs(
        'asso-image', $filename,'public'
             );
      
        $association->update([
            'nom' => $request->nom , 
            'date' => $request->date , 
            'description' => $request->description,
            'image' => $path 
        ]) ; 
      
        return redirect()->route('admin-asso.index')->with('update','L\'association a été modifié avec succès !');
     }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Association  $association
     * @return \Illuminate\Http\Response
     */
    public function destroy(Association $association)
    {
         Gate::authorize('admin-user');
         
        $association->delete() ; 

        return redirect()->route('admin-asso.index')->with('destroy','L\'association a été supprimée ! ') ;
    }


      // POUR LES EVENEMENTS 

      // evenenement index ; vue generale 
      public function eventindex(Association $association) { 

        $associations = Association::all() ;
        $users = User::all() ; 
        $count_message =  Usercontact::count() ;
         $notification = UserContact::where('status', 0)->get() ; 
         $commentaires = Commentaire::all() ; 
        return view('evenements.admin.index',compact(['commentaires','notification','association','associations','users','count_message'])) ; 
    
      }
    
    //le store , creation 
        public function eventStore(Request $request ) 
        { 
              $event = Evenement::all() ;
          
             $request->validate([
            'type' => 'required',
            'date' => 'required',
            'heure' => 'required',
            'lieu' => 'required',
            'description' =>'required',
            'image' =>'required'
        ]);

        // ne pas oublié ça avant dans la view avant STORAGE DISK ETC........ enctype="multipart/form-data"
          $path = Storage::disk('public')->put('event_image', $request->image);
      
      
          Evenement::create([
             
            'type' => $request->type,
            'date' =>  $request->date,
            'heure' =>  $request->heure,
            'lieu' =>  $request->lieu,
            'description' => $request->description,
            'association_id' => $request->association_id ,
            'image' => $path 
         ]);

         return back() ;

        }
       
        
        public function eventUpdate(Request $request , Evenement $evenement) 
        { 

            // methode classique 
          
          // $path = Storage::disk('public')->put('event_image', $request->image);

            $request->validate([
            'type' => 'required',
            'date' =>  'required',
            'heure' => 'required',
            'lieu' =>  'required',
            'description' => 'required',
            'association_id' => 'required',
            'image' => 'required' ,  
            ]); 

            

             $path = Storage::disk('public')->put('event_image', $request->image);
      
             $evenement->type = $request->type ; 
             $evenement->date = $request->date ;
             $evenement->heure  = $request->heure ;
             $evenement->lieu = $request->lieu ; 
             $evenement->description = $request->description ; 
             $evenement->association_id = $request->association_id ; 
             $evenement->image = $path ; 
             $evenement->save() ; 

        
            return back() ; 
        }

        public function eventDelete(Evenement $evenement)
         { 
           
            $evenement->delete() ; 

            return back() ; 
         }

       public function search(Request $request) {  // quand je clique sur 'search'je viens ici et j'execute ligne par ligne 
        // du coup je dis que si dans le search la personne a l'id

        $associations = Association::all() ; 
        $q = $request->q ; 
 
        $users = User::where('nom','like',"%$q%")
         ->orWhere('prenom','like',"%$q%")
         ->orWhere('email','like',"%$q%")
         ->orWhere('filiere','like',"%$q%")
         ->orWhere('role','like',"%$q%")         
         ->get()  ; 

         $count = $users->count() ; 
         $count_message =  Usercontact::count() ;
         $notification = UserContact::where('status', 0)->get() ; 
         $commentaires = Commentaire::all() ; 
         return view('associations.search.users',compact('notification','commentaires','count_message','users','associations','count','q')) ; 

        }

    
    }

