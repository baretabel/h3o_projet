<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Localite;

class MainController extends Controller
{
    //
    public function home(){
        $localites = Localite::all();
          return view('form',['localites'=> $localites]);
      }
}
