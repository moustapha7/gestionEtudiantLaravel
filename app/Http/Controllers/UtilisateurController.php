<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class UtilisateurController extends Controller
{


    //fontction pour la page formulaire d'ajout d'un user
    public function create()
    {
         if(Auth::check())
        {
            return view('utilisateurs.add_user',
            [
               
                'users'=>User::all()
                
            ]);
        }
        return view('auth.login');     
    }

    //fontction pour la page liste des users


    public function listUser()
    {
        return view('utilisateurs.list_user',
            [
                'users' => User::all()
            ]);
    }

    //fontction pour la page formulaire upadete d'un user

    public function edit($id)
    {
        if (Auth::user()->position=="Admin")
        {
           
            $user = User::where('id', $id)->first();
            return view('utilisateurs.update_user',
                [
                    'user' => $user
                ]

            );
        }
        else {
            return " ouff accéss non autorisé";
        }    
       
    }

    //fontction pour stocker un user
    public function store(Request $request)
    {
         if(Auth::check())
        {

            $user = User::create($request->all());

             return redirect()->route('users') ;


        }
        return view('auth.login');   
    }


//fontction pour stocker un user

    public function add()
    {
    if (Auth::user()->position=="Admin")
      {
              $user = new User();

              $user->prenom = Input::get('prenom');
              $user->name = Input::get('name');
              $user->position = Input::get('position');
              $user->email = Input::get('email');
              $user->password= Input::get('password');
             
              $user->save();

              
              return redirect()->route('list_user') ;
       }

      return view('auth.login');     
         
  }

  //fontction pour mise a jour  d'un user

    public function update()
     {
        if (Auth::user()->position=="Admin")
        {
            $user = User::where('id', Input::get('id'))->first();

            $user->prenom = Input::get('prenom');
            $user->name = Input::get('name');
             $user->position = Input::get('position');
            $user->email = Input::get('email');
           
            $user->save();

            
             return  redirect()->route('list_user');
        }
        else {
            return " ouff accéss non autorisé";
        }
             

    }

    //fontction pour voir les details d'un user

    public function show($id)
    {
        if (Auth::user()->position=="Admin" || Auth::user()->position=="Assistant" )
        {
        
            $user  =User::find($id);
            return view('utilisateurs.details',compact('user'));
        }
        else {
            return " ouff accéss non autorisé";
        } 
            
    }


//fontction pour la suppression d'un user
    public function destroy($id)
    {
        if (Auth::user()->position=="Admin" || Auth::user()->position=="Assistant" )
        {
       
           User::find($id)->delete();
            return redirect()->route('etudiants.list_user') ;
           }   else {
                return " ouff accéss non autorisé";
            }
    }
}
