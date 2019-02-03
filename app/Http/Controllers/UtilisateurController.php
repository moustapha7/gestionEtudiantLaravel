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
            $user = User::where('id', $id)->first();
            return view('utilisateurs.update_user',
                [
                    'user' => $user
                ]

            );
       
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
    if (Auth::user()->role_id=="Admin")
      {
              $user = new User();

              $user->prenom = Input::get('prenom');
              $user->name = Input::get('name');
              $user->role_id = Input::get('role_id');
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
        if (Auth::user()->role_id=="Admin")
        {
            $user = User::where('id', Input::get('id'))->first();

            $user->prenom = Input::get('prenom');
            $user->name = Input::get('name');
             $user->role_id = Input::get('role_id');
            $user->email = Input::get('email');
           
            $user->save();

            
             return  redirect()->route('list_user');
        }

        return view('auth.login');      

    }

    //fontction pour voir les details d'un user

    public function show($id)
    {
        if(Auth::check())
        {
        
            $user  =User::find($id);
            return view('utilisateurs.details',compact('user'));
        }
        return view('auth.login');     
            
    }


//fontction pour la suppression d'un user
    public function destroy($id)
    {
       
           User::find($id)->delete();
            return redirect()->route('etudiants.list_user') ;

    }
}
