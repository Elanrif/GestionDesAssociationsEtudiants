<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      public function __construct()
    {
        $this->middleware('guest');
    }

    public function elanrif() { 
        //
    }
    public function index()
    {
        $users = User::all() ;
        return view('users.auth.index',compact('users')) ; 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('users.auth.register') ; 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            'nom' => $request->nom ,
            'prenom'=> $request->prenom,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'num_tel' => $request->num_tel,
            'code_apogée'=> $request->code_apogée,
            'filiere' =>$request->filiere,
           ]) ; 
            auth()->login($user) ; 

            return redirect()->route('home') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.auth.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
          $request->validate([

            'nom' => ['required', 'string','min:3','max:255'],
            'prenom'=>['required', 'string' ,'min:3', 'max:255'],
            'email' => ['required', 'string', 'email','min:13','max:255',Rule::unique('users')->ignore($user->id)],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'num_tel' => ['required','numeric', Rule::unique('users')->ignore($user->id),'digits:10'],
            'code_apogée'=>['required','numeric',Rule::unique('users')->ignore($user->id),'digits:8'],
            'filiere' =>['required','string'],
            ]);

            $user->update($request->all()) ; 
 
            auth()->login($user) ; 

            return redirect()->route('home')->with('success','Vos informations ont été modifié avec succès ! ') ;  ;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
       //
    }
}
