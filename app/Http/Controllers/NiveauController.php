<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Niveau;


class NiveauController extends Controller
{

    //fontction pour afficher la page index des niveaux

    public function index()
    {
        if(Auth::check())
        {
            $niveau = Niveau::all();
            return view('niveaux.index',compact('niveau'));
         }
        return view('auth.login'); 
    }

    //fontction pour afficher la page formulaire ajout niveau

    public function create()
    {
        if(Auth::check())
        {
        return view('niveaux.create');

        }
        return view('auth.login');
    }



    //fontction pour sauvegarger les niveaux

    public function store(Request $request)
    {
        if(Auth::check())
        {
        $this->validate($request,[
            'libelle'=>'required|string|max:255',            
            ]);
        Niveau::create($request->all());
        return redirect()->route('niveaux.index')->with('success','le niveau a bien été enrégistrée!!') ;

        }
        return view('auth.login'); 
    }


//fontction pour affciher la page de modification des niveaux

    public function edit($id)
    {
        if(Auth::check())
        {
        $niveau =Niveau::find($id);
        return view('niveaux.edit',compact('niveau'));

        }
        return view('auth.login');
    }

    //fontction pour faire la modefication des niveaux

    public function update(Request $request, $id)
    {
        if(Auth::check())
        {
        $this->validate($request,[
            'libelle'=>'required|string|max:255',
           
            ]);
       Niveau::find($id)->update($request->all());
        return redirect()->route('niveaux.index')->with('success','Niveau modifié avec success') ;

        }
        return view('auth.login'); 

    }


    //fontction pour la suppression d'un niveau

    public function destroy($id)
    {
        if(Auth::check())
        {
            Niveau::find($id)->delete();
            return redirect()->route('niveaux.index')->with('success','niveaux bien supprimé') ;

        }
        return view('auth.login'); 
    }

}
