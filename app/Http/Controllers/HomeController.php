<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     //fontction pour afficher la page d'accueil
    public function index()
    {
        return view('home');
    }


    //fontction pour afficher index des niveaux
    public function indexNiveau()
    {
        return view('niveaux.index');
    }

    //fontction pour afficher la page liste des etudiants

    public function indexEtudiant()
    {
        return view('etudiants.list_etudiant');
    }

    
}
