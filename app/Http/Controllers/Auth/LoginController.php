<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create() { 

        return view('users.auth.login') ; 
    }

    public function store(Request $request)
    { 

          $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentiels = $request->validate([
            'nom' => [ 'required','email'],
            'password' => ['required'],
        ]);

         if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
 
            return redirect()->intended('home');
        }
        elseif(Auth::attempt($credentiels)){

            $request->session()->regenerate(); 

            return redirect()->intended('home') ; 
        }


       if(auth()->attempt(['nom'=>request('nom'),'password'=>request('password')])){

            return redirect()->route('home') ;
        } 
        elseif(auth()->attempt(['email'=>request('email'),'password'=>request('password')])){ 

            return redirect()->route('home');
        }

        return redirect()->route('source.layout')->with('succes','Whoops cliquez sur le boutton preçedent ! ') ; 
    }

    public function logout() { 

        auth()->logout() ; 
        return redirect()->route('welcome'); 
    }
}
