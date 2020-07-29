<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fiche extends Model
{
    public function projet(){
        return $this->hasMany('App\Projet');
    }
    public function project(){
        return $this->hasMany('App\Project');
    }
    public function ressource(){
        return $this->hasMany('App\Ressource');
    }
}
