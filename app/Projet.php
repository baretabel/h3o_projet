<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    //
    public function acteur(){
        return $this->hasMany('App\Acteur');
    }
    public function ressource(){
        return $this->hasMany('App\Ressource');
    }
    public function territoire(){
        return $this->hasMany('App\Territoire');
    }
}
