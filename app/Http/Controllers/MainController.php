<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Localite;
<<<<<<< HEAD
use App\Projet;
use App\Acteur;
use App\Territoire;
use App\Ressource;
use Carbon\Carbon;


class MainController extends Controller
{   
    //
    public function home(){
        $localites = Localite::all();
        return view('forma',['localites'=> $localites]);
    }
    //Insert d'un nouveau projet dans la base de données
    public function nouv_projet(Request $request){
            //recupration de la date et l'heure
            $current_date_time = Carbon::now()->toDateTimeString();
        
            $projet = new Projet;
            $projet->categorie=$request->categorie;
            $projet->nom_projet=$request->nom;
            $projet->contexte=$request->contexte;
            $projet->but=$request->but;
            $projet->objectif=$request->objectif;
            $projet->livrable=$request->livrable;
            $projet->debut=$request->debut;
            $projet->fin=$request->fin;
            $projet->public=$request->public;
            $projet->created_at=$current_date_time;
            $projet->updated_at=$current_date_time;
            $projet->save();
        
    }
    //Insert d'un territoire concerneé dans la table territoires
    public function territoire(Request $request){
        //recuperation id  du dernier projet créee
        $projet = Projet::select('id')->latest('id')->first();
        $current_date_time = Carbon::now()->toDateTimeString();


        $territoire= new Territoire;
        $territoire->projet_id= $projet->id;
        $territoire->localite_id= $request->localite_id;
        $territoire->created_at=$current_date_time;
        $territoire->updated_at=$current_date_time;
        $territoire->save();
    }
    //Insert d'un nouvel acteur dans la table acteurs
    public function acteur(Request $request){
        $projet = Projet::select('id')->latest('id')->first();
        $current_date_time = Carbon::now()->toDateTimeString();

        $acteur= new Acteur;
        $acteur->projet_id= $projet->id;
        $acteur->acteur= $request->acteur;
        $acteur->role= $request->role;
        $acteur->created_at=$current_date_time;
        $acteur->updated_at=$current_date_time;
        $acteur->save();
        
    }
    //Insert competence dans la table ressources
    public function competence(Request $request){
        $projet = Projet::select('id')->latest('id')->first();
        $current_date_time = Carbon::now()->toDateTimeString();

        $ressource= new Ressource;
        $ressource->projet_id= $projet->id;
        $ressource->ressource= $request->competence;
        $ressource->type= false;
        $ressource->created_at=$current_date_time;
        $ressource->updated_at=$current_date_time;
        $ressource->save();
        
    }
    // Insert materiel dans la table ressource
    public function materiel(Request $request){
        $projet = Projet::select('id')->latest('id')->first();
        $current_date_time = Carbon::now()->toDateTimeString();

        $ressource= new Ressource;
        $ressource->projet_id= $projet->id;
        $ressource->ressource= $request->materiel;
        $ressource->type = true;
        $ressource->created_at=$current_date_time;
        $ressource->updated_at=$current_date_time;
        $ressource->save();
        
    }
=======

class MainController extends Controller
{
    //
    public function home(){
        $localites = Localite::all();
          return view('form',['localites'=> $localites]);
      }
>>>>>>> 7acc08665348e98051ccb016f23565620de34f7e
}
