<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Http\Request;
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
         
        $associations = Association::all() ; 

        return view('associations.admin.index', compact('associations'));
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
        return view('associations.admin.create',['associations'=>$associations]) ; 
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
        $filename = time().'.'. $request->file('image')->extension() ; 
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
        return view('associations.admin.show',compact('association')) ; 
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

        return view('associations.admin.edit',compact(['association','associations'])); 
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
        //je recupère déja l'assocition dans le lien de blade même dans cette methode je l'es en parametre donc pas besoin de faire un__ Association::where('id',$association->id)  ;
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

           $path = Storage::disk('public')->put('asso-image', $request->image);
           dd($path) ;
      
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
}
