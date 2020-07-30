<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fiche;
use App\Project;
use App\Localite;
use App\Projet;
use App\Acteur;
use App\Territoire;
use App\Ressource;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function home(){
        $fiches = Fiche::all();
        return view('dashboard',['fiches'=> $fiches]);
    }
    public function projet($id){
        $fiches = Fiche::where('id', $id)->first();
        
        return view('projet',['fiches'=> $fiches]);
        
    }
    public function __invoke(Request $request)
    {
        //
    }
}
