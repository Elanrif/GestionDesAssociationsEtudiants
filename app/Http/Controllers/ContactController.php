<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\Usercontact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
     public function indexContact()
    {
     
     $associations = Association::all() ; 

    return view('contact.index',['associations'=>$associations]) ;
}

    public function authContact(Request $request) //personne authentifié
    { 
        $request->validate([
            'message'=>'required' ,
        ]) ; 

        Usercontact::create($request->all()) ; 

        return redirect()->route('home')  ; 
    }

     public function guestContact(Request $request) //personne invité du site 
    { 
        dd($request->all());
    }
}
