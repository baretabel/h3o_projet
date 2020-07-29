<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Project;
use App\Fiche;
use App\Competence;
use App\Ressource;
use Carbon\Carbon;


class SecondController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function home(){
        $competences = Competence::all();
        return view('form',['competences'=> $competences]);
    }
    public function nouv_projet(Request $request){
        //recupration de la date et l'heure
        $current_date_time = Carbon::now()->toDateTimeString();
    
        $project = new Project;
        $project->prenom=$request->prenom;
        $project->nom=$request->nom;
        $project->nom_projet=$request->projet;
        $project->description=$request->description;
        $project->but=$request->detail;
        $project->date=$request->date;
        $project->created_at=$current_date_time;
        $project->updated_at=$current_date_time;
        $project->save();
        $this->fiche();
}
public function fiche(){
    $project = Project::select('id')->latest('id')->first();
    $current_date_time = Carbon::now()->toDateTimeString();
    
    $fiche = new Fiche;
    $fiche->project_id=$project->id;
    $fiche->commentaire=null;
    $fiche->created_at=$current_date_time;
    $fiche->updated_at=$current_date_time;
    $fiche->save();

}
public function competence(Request $request){
    $fiche = Fiche::select('id')->latest('id')->first();
    $current_date_time = Carbon::now()->toDateTimeString();

    $ressource= new Ressource;
    $ressource->fiche_id= $fiche->id;
    $ressource->ressource= $request->competence;
    $ressource->type= null;
    $ressource->created_at=$current_date_time;
    $ressource->updated_at=$current_date_time;
    $ressource->save();
    
}
    public function __invoke(Request $request)
    {
        //
    }
}
