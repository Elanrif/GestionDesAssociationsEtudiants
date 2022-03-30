<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
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

            User::create($request->all()) ; 

            return redirect()->route('home') ;
    }
}