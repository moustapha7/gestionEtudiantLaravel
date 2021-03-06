<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Etudiant;
use App\Niveau;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EtudiantController extends Controller
{
    public function __construct(){
        //  $this->middleware('auth');
    }

    //fontction pour afficher  la page liste des etudiants

    public function index() 
    {
         if(Auth::check())
        {

            return view('etudiants.list_etudiant',
            [
                'etudiants' => Etudiant::all()
            ]);
        }
        return view('auth.login');     
    }


    //fontction pour la page formulaire d'ajout d'un etudiant

    public function create()
    {
         if (Auth::user()->position=="Professeur" || Auth::user()->position=="Admin")
        {
            return view('etudiants.add_etudiant',
            [
               
                'niveaux'=>Niveau::all(),
                'etudiants'=>Etudiant::all()
            ]);
        }
        else {
            return " ouff accéss non autorisé";
        }     
    }


    //fontction pour la page formulaire de modification d'un etudiant 

    public function edit($id)

    {
        if (Auth::user()->position=="Professeur" || Auth::user()->position=="Admin")
        {

            $etudiant = Etudiant::where('id', $id)->first();
            return view('etudiants.update_etudiant',
                [
                    'etudiant' => $etudiant,               
                    'niveaux'=>Niveau::all()
                
                ]

            );
         } else {
                return " ouff accéss non autorisé";
            }   
    }

    //fontction pour stocker les infos etudiants

    public function store(Request $request)
    {
         if(Auth::check())
        {

            $etudiant = Etudiant::create($request->all());

             return redirect()->route('etudiants') ;


        }
        return view('auth.login');   
    }

    //fontction pour  enregistrer un etudiant


    public function add()
      {
        if(Auth::check())
        {
                $etudiant = new Etudiant();

                $etudiant->prenom = Input::get('prenom');
                $etudiant->nom = Input::get('nom');
                $etudiant->adresse = Input::get('adresse');
                $etudiant->dateNaissance = Input::get('dateNaissance');
                $etudiant->email= Input::get('email');
                $etudiant->telephone = Input::get('telephone');
                $etudiant->niveau_id = Input::get('niveau');
               
                $etudiant->save();

                
                return redirect()->route('list_etudiant') ;
         }

        return view('auth.login');     
           
    }

    //fontction pour modification d'un etudiant

    public function update()
     {
        if(Auth::check())
        {


            $etudiant = Etudiant::where('id', Input::get('id'))->first();

           
                $etudiant->prenom = Input::get('prenom');
                $etudiant->nom = Input::get('nom');
                $etudiant->adresse = Input::get('adresse');
                $etudiant->dateNaissance = Input::get('dateNaissance');
                $etudiant->email= Input::get('email');
                $etudiant->telephone = Input::get('telephone');
                $etudiant->niveau_id = Input::get('niveau');
               
                $etudiant->save();

                
               // return redirect('etudiants.index');
             return redirect()->route('list_etudiant') ;

         }

        return view('auth.login');       
    }


    //fontction pour voir les details d'un etudiant

    public function show($id)
    {
        if(Auth::check())
        {
        
            $etudiant  =Etudiant::find($id);
            return view('etudiants.show',compact('etudiant'));
        }
        return view('auth.login');     
            
    }

    //fontction pour la suppression d'un etudiant

     public function delete($id) 
     {
        if (Auth::user()->position=="Professeur" || Auth::user()->position=="Admin")
        {


        $etudiant = Etudiant::where('id', $id)->first();
        $etudiant->forceDelete();

        return redirect()->route('list_etudiant') ;

        }

        else {
            return " ouff accéss non autorisé";
        } 
    }




}
